<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{

    public function indexAll()
    {
        $products = Product::all();
        $category = Categories::all();
        return view('comercial-allProducts',compact(['products','category']));
    }
    public function Index()
    {
        $products = Product::where('seller_id',Auth()->id())->get();
        return view('dashboard.products.products-list',compact(['products']));
    }

    public function Add()
    {
        $category = Categories::all();
        return view('dashboard.products.products-add',compact(['category']));
    }

    public function Store(Request $request)
    {
        $validate = $request->validate([
            "description" => "required",
            "dimension" => "required",
            "seller_id" => "required",
            "cate_id" => "required",
            "popular" => "nullable",
            "status" => "nullable",
            "weight" => "required",
            "image" => "image|file|nullable|max:5000",
            "price" => "required",
            "color" => "required",
            "name" => "required",
            "slug" => "required",
            "qty" => "required",
        ]);
        // @dd($validate);
        if($request->hasFile('image'))
        {
            $validate['image'] = $request->file('image')->store($request->name);
        }
        Product::create($validate);
        return redirect('product-list')->with('status','Product Added Succesfully');
    }

    public function Edit($slug)
    {
        $category = Categories::all();
        $product = Product::where('slug',$slug)->get()->first();
        return view('dashboard.products.products-edit',compact(['product','category']));
    }

    public function Update(Request $request, $id)
    {
        $validate = $request->validate([
            "description" => "required",
            "dimension" => "required",
            "cate_id" => "required",
            "popular" => "nullable",
            "status" => "nullable",
            "weight" => "required",
            "image" => "image|file|nullable|max:5000",
            "price" => "required",
            "color" => "required",
            "name" => "required",
            "slug" => "required",
            "qty" => "required",
        ]);
        if($request->hasFile('image'))
        {
            if($request->oldimage)
            {
                Storage::delete($request->oldimage);
            }
            $validate['image'] = $request->file('image')->store($request->image);
        }
        $product = Product::find($id);
        $product->Update();
        return redirect('product-list')->with('status','product has been edited');
    }

    public function Destroy($id)
    {
        $delete = Product::find($id);
        if($delete['image'] == true)
        {
            Storage::delete($delete->image);
        }
        Product::destroy($id);
        return redirect('product-list')->with('status','Product Deleted');
    }
}
