<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductDetailResource;
use App\Http\Resources\ProductDetails;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product(Request $request)
    {
        // return $request;
        // return new ProductResource(Product::get());
        if($request->search == true)
        {
            $product = Product::where("name","LIKE","%$request->search%")->get();
            return ProductResource::collection($product);
        }
        $product = Product::get();
        return ProductResource::collection($product);
    }

    public function productDetails($slug)
    {
        return new ProductDetailResource(Product::where('slug',$slug)->first());
    }

    // public function productSearch(Request $request)
    // {

    //     else
    //     {
    //         return response()->json(['message' => '']);
    //     }

    // }
}
