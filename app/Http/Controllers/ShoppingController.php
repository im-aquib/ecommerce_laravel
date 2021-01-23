<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Cart;

class ShoppingController extends Controller
{
    public function add_to_cart(Request $request)
    {

        $pdt = Product::find(request()->pdt_id);

        $cartItem = Cart::add([

            'id' => $pdt->id,

            'name' => $pdt->name,

            'qty' => request()->qty,

            'price' => $pdt->price

        ]);

        Cart::associate($cartItem->rowId, 'App\Product');

        return redirect()->route('cart');

        

    }

    public function cart()
    {
        
        return view('cart');
    }

    public function cart_delete($id)
    {
        
        Cart::remove($id);

        return redirect()->back();

    }
}


