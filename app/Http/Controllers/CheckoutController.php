<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Cart;
use Stripe\Stripe; 
use Stripe\charge;
use Mail;
use Session;

class CheckoutController extends Controller
{
    public function index()
    
    {
        return view('checkout');
    }

    public function pay()
    {
    

        Stripe::setApiKey('sk_test_51ICK2JLvMjvQkhmZxJKreiyqegrElErKif0EhosIQi9Cvs5z58Aj6uG2RgmI2t8SG4YOyLDUuQmaQDmcRJbfIRJW00DcRxOona');

        

        $charge = Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'inr',
            'description' => 'VEGE MART',
            'source' => request()->stripeToken
        ]);

        session::flash('success', 'Purchase Successfull. Wait for our email.');

        Cart::destroy();

        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessfull);



        return redirect('/');
        
    }
    
}


