<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Carts;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Order_list;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;

class CheckoutingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function myOrder()
    {
        $user = $this->userValidate();
        $myorder = Order_list::where('user_id',$user->id)->get();
        // $order = Orders::where('track_code',$myorder->track_code)->get();

        return response()->json([
            'status' => 'succes',
            'myorder' => $myorder,
        ]);
    }

    public function cartIndex()
    {
        $user = $this->userValidate();
        // return $user;
        $cart = Carts::where('user_id',$user->id)->get();
        return response()->json([
            'data' => $cart
        ]);
        // return new CartResource($cart);
    }

    public function cartStore(Request $request)
    {
        $user = $this->userValidate();
        $cart = new Carts;
        $cart->user_id = $user->id;
        $cart->prod_id = $request->prod_id;
        $cart->prod_qty = $request->prod_qty;
        $cart->seller_id = $request->seller_id;
        $cart->save();
        return response()->json([
            'status' => 'succes',
            'cart' => $cart
        ]);
    }

    public function cartDestroy($id)
    {
        $user = $this->userValidate();
        $check = Carts::where('user_id',$user->id)->find($id);
        if($check)
        {
            Carts::destroy($id);
            return response()->json(['message'=> 'Carts deleted']);
        }
        else
        {
            return response()->json(['message'=> 'this is not your carts']);
        }
    }

    public function makeOrders(Request $request)
    {
        $user = $this->userValidate();
        $total = 0;
        $cart = Carts::where('user_id',$user->id)->get();
        foreach($cart as $item)
        {
            $total += $item->product->price * $item->prod_qty;
        }
        $user = User::where('id',$user->id)->first();
        $rand = rand();
        Order_list::create([
            'user_id' => $user->id,
            'track_code' => $rand,
            'total_price' => $total
        ]);
        if($user->adress == null)
        {
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->adress = $request->adress;
            $user->country = $request->country;
            $user->postcode = $request->postcode;
            $user->city = $request->city;
            $user->update();
        }

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

        $cartitem = Carts::where('user_id',$user->id)->get();
        Carts::destroy($cartitem);


        $orderlist = Order_list::where('track_code',$rand)->get();
        return response()->json([
            'message' => 'Orders Created',
            'orders' => $orderlist
        ]);
    }

    public function userValidate()
    {
        return User::where('id',auth()->guard('api')->id())->first();
    }
}

