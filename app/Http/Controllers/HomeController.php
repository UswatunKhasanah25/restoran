<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Makanan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $makanans = Makanan::orderBy('updated_at', 'ASC')->paginate(8);
        return view('home', compact('makanans'));
    }
}