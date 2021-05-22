<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Makanan;
use App\User;
use App\Pemesanan;

class HomeController1 extends Controller
{
	public function index() {
    	$makananCount = Makanan::count();
    	$userCount = User::count();
    	$pendingOrder = Pemesanan::where('status', '!=', 2)->count();
    	$completeOrder = Pemesanan::where('status', 2)->count();
    	return view('beranda', compact('makananCount', 'userCount', 'pendingOrder', 'completeOrder'));
    }

}
