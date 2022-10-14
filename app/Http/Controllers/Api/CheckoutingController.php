<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Models\Carts;

class CheckoutingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
        $check = Carts::find($id)->where('user_id',$user->id);
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



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function userValidate()
    {
        return User::where('id',auth()->guard('api')->id())->first();
    }
}

