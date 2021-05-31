<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
use Auth;

class ShowController extends Controller
{
    public function show($id)
    {
        $user = Auth::user();
        $product = Product::findOrFail($id);
        $cart = 0;
        foreach(Cart::content() as $row){
            if($row->options->user_id === Auth::user()->id){
                $cart += $row->qty;
            }
        }
        return view('shop',compact('user','product', 'cart'));
    }
}