<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class ComercialController extends Controller
{
    public function Index()
    {
        $products = Product::latest()->get();
        $categories = Categories::all();
        return view('comercial-index',compact(['products','categories']));
    }

    public function Details(Request $request, $slug)
    {
        $product = Product::where('slug',$slug)->first();
        return view('comercial-details',compact(['product']));
    }
}
