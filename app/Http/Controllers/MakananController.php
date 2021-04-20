<?php

namespace App\Http\Controllers;
use App\Kategori;
use App\Makanan;
use Illuminate\Http\Request;
use PDF;

class MakananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makanans = Makanan::paginate(5);

        return view('makanan.index', compact('makanans'))->with(
            'i',
            (request()->input('page', 1) - 1) * 5
        );
    }

    public function index2()
    {
        return view('makanan.makananUser');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('makanan.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'id_kategori' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'photo' => 'required',
        ]);

        $makanan = new Makanan();
        $makanan->nama = $request->nama;
        $makanan->id_kategori = $request->id_kategori;
        $makanan->harga = $request->harga;
        $makanan->stok = $request->stok;

        if ($request->file('photo')) {
            $image_name = $request->file('photo')->store('images', 'public');
            $makanan->photo = $image_name;
        }
        $makanan->save();
        return redirect()
            ->route('makanan.index')
            ->with('success', 'Makanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Makanan  $makanan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $makanan = \App\Makanan::find($id);
        return view('makanan.show', compact('makanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Makanan  $makanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::all();
        $makanan = \App\Makanan::find($id);
        return view('makanan.edit', compact('makanan', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Makanan  $makanan
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $makanan = \App\Makanan::find($id);
        $request->validate([
            'nama' => 'required',
            'id_kategori' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'photo' => 'required',
        ]);
        $makanan->nama = $request->nama;
        $makanan->id_kategori = $request->id_kategori;
        $makanan->harga = $request->harga;
        $makanan->stok = $request->stok;

        if (
            $makanan->photo &&
            file_exists(storage_path('app/public/' . $makanan->photo))
        ) {
            \Storage::delete('public/' . $makanan->photo);
        }
        $image_name = $request->file('photo')->store('images', 'public');
        $makanan->photo = $image_name;

        $makanan->save();

        return redirect()
            ->route('makanan.index')
            ->with('success', 'Data Makanan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Makanan  $makanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $makanan = \App\Makanan::find($id);
        $makanan->delete();

        return redirect()
            ->route('makanan.index')
            ->with('success', 'Makanan Berhasil Dihapus');
    }

    public function cetak_pdf()
    {
        $makanans = Makanan::all();

        $pdf = PDF::loadview('makanan_pdf', ['makanan' => $makanans]);
        return $pdf->download('laporan-makanan-pdf');
    }

    public function bukuPdf()
    {
        $datas = Buku::all();
        $pdf = PDF::loadView('laporan.buku_pdf', compact('datas'));
        return $pdf->download('laporan_buku_' . date('Y-m-d_H-i-s') . '.pdf');
    }
}