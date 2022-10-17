<?php

namespace App\Http\Controllers\Web;

// use Midtrans\Config;
use App\Models\User;
use Midtrans\Config;
use App\Models\Carts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order_list;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    // public $snapToken;
    public function Midtrans()
    {
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
                'gross_amount' => 10000,
            ),
            'customer_details' => array(
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($snapToken);
        // return view
    }

    public function paymentCod(Request $request)
    {
        $request->validate([
        "firstname"=> "required",
        "lastname"=> "required",
        "email"=> "required",
        "phone"=> "required",
        "adress"=> "required",
        "country"=> "required",
        "postcode"=> "required",
        "city"=> "required",
        ]);
        $rand = rand();
        // return $request;
        $cart = Carts::where('user_id',Auth::id())->get();
        $user = User::where('id',Auth::id())->first();
        Order_list::create([
            'user_id' => Auth::id(),
            'track_code' => $rand,
            'total_price' => $request->total_price
        ]);
        if($user->adress == null)
        {
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->adress = $request->adress;
            $user->country = $request->country;
            $user->postcode = $request->postcode;
            $user->city = $request->city;
            $user->update();
        }
        // $orderlist = Order_list::where('user_id',Auth::id())->first();
        foreach($cart as $carts)
        {
            Orders::create([
                'seller_id' => $carts->seller_id,
                'firstname' => $user->firstname,
                'track_code' => $rand,
                'user_id' => $user->id,
                'prod_id' => $carts->prod_id,
                'lastname' => $user->lastname,
                'address' => $user->adress,
                'country' => $user->country,
                'price' => $carts->product->price,
                'status' => 'pending',
                'email' => $user->email,
                'phone' => $user->phone,
                'city' => $user->city,
                'qty' => $carts->prod_qty
            ]);
            $prod = Product::where('id',$carts->prod_id)->first();
            $prod->qty = $prod->qty - $carts->prod_qty;
            $prod->update();
        }

        $cartitem = Carts::where('user_id',Auth::id())->get();
        Carts::destroy($cartitem);
        return view('comercial-thanks');
    }
}
