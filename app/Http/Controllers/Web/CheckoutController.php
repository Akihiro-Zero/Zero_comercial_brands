<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Product;
use App\Models\User;
use Midtrans\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // public $snapToken;
    public function Index()
    {       $user = User::where('id',Auth()->id())->get()->first();
            $cart = Carts::where('user_id',Auth()->id())->get();

            // $prod = Product::all();
        $total = 0;
        foreach($cart as $prod)
        {
            $total = $total + $prod->product->price * $prod->prod_qty;
        }
        // Set your Merchant Server Key
        Config::$serverKey = 'SB-Mid-server-Co0kfk9v1hgjneWVQBmI5WRT';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = false;
        // Set sanitization on (default)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $total,
            ),
            'customer_details' => array(
                'first_name' => $user->firstname,
                'last_name' => $user->lastname,
                'email' => $user->email,
                'phone' => $user->phone,
                ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('comercial-checkout',compact(['user','cart','snapToken']));
        die;
        /**
         *
         */
        $oldcarts = Carts::where('user_id',Auth()->id())->get();
        foreach ($oldcarts as $item)
        {
            if(!Product::where('id',$item->prod_id)->where('qty','>=',$item->prod_qty)->exists());
            $removecart = Carts::where('user_id',Auth()->id())->where('prod_id',$item->prod_id)->first();
            $removecart->delete();
        }

    }
}
