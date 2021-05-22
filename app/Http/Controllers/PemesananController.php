<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Makanan;
use App\Meja;
use App\Pemesanan;
use Carbon\Carbon;
use Auth;

class PemesananController extends Controller
{
    public function getPemesanan($id) {
    	$makanan = \App\Makanan::find($id);
        $meja = \App\Meja::all();
    	$date = Carbon::now();
    	return view('pemesanan.create', compact('makanan', 'meja', 'date'));
    }

    public function postPemesanan(Request $request) {
    	$makanan = \App\Makanan::find($request->makanan_id);
    	$meja = \App\Meja::find($request->no_meja);
        $total = $makanan->harga * $request->qty;
    	$date_time = date('Y-m-d H:i:s', strtotime($request->for_date .' '. $request->for_time));

    	$order = new Pemesanan;
    	$order->user_id = Auth::id();
    	$order->makanan_id = $request->makanan_id;
        $order->no_meja = $request->no_meja;
    	$order->qty = $request->qty;
    	$order->total = $total;
    	$order->transaksi = $request->transaksi;
    	if ($request->transaksi == '1') {
    		$order->transfer = $request->transfer;
    	}
    	$order->status = 0;
        if($request->file('transfer')){
            $image_name = $request->file('transfer')->store('images','public');
            $order->transfer = $image_name;
        }
    	$order->save();
        $order= Makanan::where('id', $order->makanan_id)
        ->update([
            'stok' => ($order->makanan->stok - $order->qty),
            ]);
        // $order= Meja::where('nomor', $order->no_meja)
        // ->update([
        //     'nomor' => ($order->meja->nomor.hide()),
        //     ]);
    	return redirect()->route('successPemesanan');
    }

    public function listPemesanan() {
        $orders = Pemesanan::where('status', '!=', 2)->where('user_id', Auth::id())->orderBy('updated_at', 'DESC')->get();
        return view('pemesanan.list', compact('orders'));
    }

    public function detailPemesanan($id) {
    	$order = Pemesanan::find($id);
    	return view('pemesanan.detail', compact('order'));
    }

    public function cancelPemesanan(Request $request, $id) {
        $order = Pemesanan::find($id);
        $order->delete();
        $order= Makanan::where('id', $order->makanan_id)
        ->update([
            'stok' => ($order->makanan->stok + $order->qty),
            ]);
        return redirect()->route('listPemesanan')->with('message', 'Sesuai permintaan kamu, Pesanan kami batalkan. Terimakasih, Silahkan lakukan pemesanan kembali.');
    }

    public function successPemesanan() {
        return view('pemesanan.success');
    }
}
