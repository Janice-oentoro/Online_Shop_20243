<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Product;
use App\Order;
use Cart;

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
        $user = Auth::user();
        if($user->id_admin == 1)
        {
        $products = Product::all();
        return view('admin.main', compact('products'));
        }

        else if($user->id_admin == 0)
        {
        $products = Product::all();
        return view('home', compact('products'));
        }
    }
}
