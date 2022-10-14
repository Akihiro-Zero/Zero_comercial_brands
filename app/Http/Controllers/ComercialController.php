<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class ComercialController extends Controller
{
    public function Index()
    {
        $product = Product::all();
        $products = Product::orderBy('id','desc')->get();
        $category = Categories::all();
        return view('comercial-index',compact(['product','products','category']));
    }

    public function Details(Request $request, $slug)
    {
        $product = Product::where('slug',$slug)->first();
        return view('comercial-details',compact(['product']));
    }
}
