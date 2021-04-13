<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggans = Pelanggan::latest()->paginate(5);
  
        return view('pelanggan.index',compact('pelanggans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
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
            'email' => 'required',
        ]);
  
        Pelanggan::create($request->all());
   
        return redirect()->route('pelanggan.index')
                        ->with('success','Pelanggan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelanggan = \App\Pelanggan::find($id);
        return view('pelanggan.show',compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelanggan = \App\Pelanggan::find($id);
        return view('pelanggan.edit',compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Pelanggan $pelanggan)
    {
        $pelanggan = \App\Pelanggan::find($id);
        $request->validate([
            'nama' => 'required',
        ]);
  
        $pelanggan->update($request->all());
  
        return redirect()->route('pelanggan.index')
                        ->with('success','Pelanggan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggan = \App\Pelanggan::find($id);
        $pelanggan->delete();
  
        return redirect()->route('pelanggan.index')
                        ->with('success','Pelanggan deleted successfully');
    }
}
