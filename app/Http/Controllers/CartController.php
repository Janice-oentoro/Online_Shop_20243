<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cart;
use Auth;
use Validator;
use App\Barang;
use App\Order;
use DB;
use App\User;
use Haruncpi\LaravelIdGenerator\IdGenerator;
class CartController extends Controller

{

    public function index()
    {
		$total = 0;
		$qtty = 0;
		$i = 0;

        foreach(Cart::content() as $item)
		{
            if($row->options->user_id === Auth::user()->id){
				$total = $total + ($item->price * $item->qty);
				$qtty += $item->qty;
				$i++;
            }
		}
		return view('cart', compact('price', 'qty', 'i'));
    }

    public function store(Request $request)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            $cart_id = $cartItem->options->user_id;
            if($cart_id === Auth::user()->id){
                return $cartItem->id === $request->id;
            }
                }); 
            
                if(!$duplicates->isEmpty())
                {
                    return redirect('cart')->withSuccessMessage('Item is already in cart');
                }
    
                if($request->stock == 0)
                {
                   return redirect()->back()->with(['error'=>'Stock is finished']);
                }

            
		Cart::add($request->id, $request->name, 1, $request->price);
		return redirect('cart')->withSuccessMessage('Item added to cart');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false]);
        }

        $cart = Cart::update($id, $request->quantity);
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return redirect('cart');
    }
}
