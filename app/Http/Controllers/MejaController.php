<?php

namespace App\Http\Controllers;

use App\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mejas = Meja::paginate(5);
        return view('meja.index',compact('mejas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meja.create');
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
            'nomor' => 'required',
        ]);
  
        Meja::create($request->all());
   
        return redirect()->route('meja.index')
                        ->with('success','Meja created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function edit(Meja $meja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meja $meja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meja = \App\Meja::find($id);
        $meja->delete();
  
        return redirect()->route('meja.index')
                        ->with('success','Meja deleted successfully');
    }
}
