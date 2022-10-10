<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function Index()
    {       $user = User::where('id',Auth()->id())->get()->first();
            $cart = Carts::where('user_id',Auth()->id())->get();
            // return $user;
            return view('comercial-checkout',compact(['user','cart']));

        $oldcarts = Carts::where('user_id',Auth()->id())->get();
        foreach ($oldcarts as $item)
        {
            if(!Product::where('id',$item->prod_id)->where('qty','>=',$item->prod_qty)->exists());
            $removecart = Carts::where('user_id',Auth()->id())->where('prod_id',$item->prod_id)->first();
            $removecart->delete();
        }

    }
}
