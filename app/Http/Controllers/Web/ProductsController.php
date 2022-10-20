<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{

    public function indexCategory($id)
    {
        $products = Product::where("cate_id",$id)->get();
        $category = Categories::all();
        return view('comercial-allProducts',compact(['products','category']));
    }

    public function indexAll(Request $request)
    {
        if($request->search)
        {
            $products = Product::where("name","LIKE","%$request->search%")->get();
            $category = Categories::all();
         return view('comercial-allProducts',compact(['products','category']));
        }
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

    public function productEdit($slug)
    {
        $user = User::where('id',Auth::id())->first();
        $product = Product::where('seller_id',Auth::id())->where('slug',$slug)->first();

        return view('dashboard.products.products-edit',compact('product'));
    }

    public function productUpdate(Request $request,$id)
    {
        // return $request;
        $user = User::where('id',Auth::id())->first();
        if(!$user->hasRole(['admin','seller']))
        {
            return response()->json(['message' => 'you are not admin']);
        }

        $product = Product::where('seller_id',Auth::id())->find($id);
        if(!$product)
        {
            return response()->json(['message' => 'product not found']);
        }

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
            if($request->oldimage)
            {
                Storage::delete($request->oldimage);
            }
            $validate['image'] = $request->file('image')->store('product-image/'.$user->name);
        }
        $product->update($validate);
        return response()->json(['message' => 'product has been added']);
    }

    public function Store(Request $request)
    {
        $user = User::where('id',Auth::id())->first();
        if(!$user->hasRole(['admin','seller']))
        {
            return response()->json(['message' => 'you are not admin']);
        }
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
        if($request->hasFile('image'))
        {
            $validate['image'] = $request->file('image')->store('product-image/'.$user->name);
        }
        Product::create($validate);
        return redirect('product-list')->with('status','Product Added Succesfully');
    }

    public function Edit($slug)
    {
        $category = Categories::all();
        $product = Product::find($slug);
        return view('dashboard.products.products-edit',compact(['product','category']));
    }

    public function Update(Request $request, $id)
    {
        $user = User::where('id',Auth::id())->first();
        if(!$user->hasRole(['admin','seller']))
        {
            return response()->json(['message' => 'you are not admin']);
        }
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
            $validate['image'] = $request->file('image')->store('product-image/'.$user->image);
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
        return response()->json(['status' => 'Product Deleted']);
    }
}
