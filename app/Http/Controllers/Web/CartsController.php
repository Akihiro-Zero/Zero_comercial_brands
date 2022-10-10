<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{
    public function Index()
    {
        $cartitem = Carts::where('user_id',Auth()->id())->get();
        return view('comercial-cart',compact(['cartitem']));
    }

    public function Store(Request $request)
    {
        // return $request;
        $prod_id = $request->input('prod_id');
        $prod_qty = $request->input('product-quatity');
        $user_id = $request->input('user_id');
        $seller_id = $request->input('seller_id');

        $prod_check = Product::where('id',$prod_id)->first();
        if($prod_check)
        {
            if(Carts::where('prod_id',$prod_id)->where('user_id',Auth()->id())->exists())
            {
                return response()->json(['status' => 'Products Already added']);
            }
            else
            {
                $cartitem = new Carts();
                $cartitem->user_id = $user_id;
                $cartitem->prod_id = $prod_id;
                $cartitem->prod_qty = $prod_qty;
                $cartitem->seller_id = $seller_id;
                $cartitem->save();
                return response()->json(['status' => $prod_check->name. 'Succesfully Added']);
            }
        }
        else
        {
            return response()->json(['status' => 'Products Under Maintaince']);
        }

        // Carts::create([
        //     ''
        // ])
    }
    public function Delete($id)
    {
        // dd($id);
        $cartitem = Carts::find($id);
        $cartitem->delete();
        return response()->json(['status' => 'Cart Deleted']);
    }
}
