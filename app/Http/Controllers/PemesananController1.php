<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pemesanan;
use PDF;

class PemesananController1 extends Controller
{
    public function index()
    {
        $orders = Pemesanan::where('status', 2)
            ->orderBy('updated_at', 'DESC')
            ->get();
        return view('admin.order', compact('orders'));
    }

    public function pending()
    {
        $orders = Pemesanan::where('status', '!=', 2)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('admin.pending', compact('orders'));
    }

    public function detail($id)
    {
        $order = Pemesanan::find($id);
        return view('admin.detail', compact('order'));
    }

    public function remove($id)
    {
        $order = Pemesanan::destroy($id);
        return redirect()
            ->route('all-order')
            ->with('message', 'Pemesanan has been deleted.');
    }

    public function verify(Request $request, $id)
    {
        if ($request->method == 'complete') {
            return $this->completetPemesanan($id);
        } elseif ($request->method == 'accept') {
            return $this->acceptPemesanan($id);
        } else {
            return $this->cancelPemesanan($id);
        }
    }

    private function completetPemesanan($id)
    {
        $order = Pemesanan::find($id);
        $order->status = 2;
        $order->save();
        return redirect()
            ->route('pending-order')
            ->with(
                'message',
                'Pemesanan has mark as completly order. Go to the Completly Pemesanan Page to see that.'
            );
    }

    private function acceptPemesanan($id)
    {
        $order = Pemesanan::find($id);
        $order->status = 1;
        $order->save();
        return redirect()
            ->route('pending-order')
            ->with('message', 'Pemesanan has been accepted.');
    }

    private function cancelPemesanan($id)
    {
        $order = Pemesanan::destroy($id);
        return redirect()
            ->route('pending-order')
            ->with('message', 'OK. Pemesanan has been canceled.');
    }
    public function laporan()
    {
        return view('admin/laporan');
    }

    public function print()
    {
        $order = pemesanan::all();

        $pdf = PDF::loadview('laporan/laporan', ['pemesanans' => $order]);
        return $pdf->download();
    }
}