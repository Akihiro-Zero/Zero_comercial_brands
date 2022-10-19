<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{

    public function sellProdList()
    {
        $user = $this->userValidate();
        $orders = Orders::where('seller_id',$user->id)->get();
        return response()->json([
            'status' => 'succes',
            'orders' => $orders,
        ]);
    }

    public function userList()
    {
        $user = User::where('id',auth()->guard('api')->id())->first();
        if($user->hasRole('admin'))
        {
            $user_list = User::all();
            return response()->json([
                'status' => 'succes',
                'user' => $user_list
            ]);
        }
    }

    public function userDelete($id)
    {
        $user = User::where('id',auth()->guard('api')->id())->first();
        if($user->hasRole('admin'))
        {
            User::destroy($id);
            return response()->json(['status' => 'user deleted']);
        }
    }
    public function userUpdate(Request $request)
    {
        $user = User::where('id',auth()->guard('api')->id())->first();
        if($user)
        {
            $user->update($request->all());
            return response()->json([
                'status' => 'succes',
                'data' => $user
            ]);
        }
    }

    public function userToSeller(Request $request)
    {
        $user = User::where('id',auth()->guard('api')->id())->first();
        if($user)
        {
            $user->shop_name = $request->shop_name;
            $user->shop_slug = Str::slug($request->shop_name);
            $user->rekening = $request->rekening;
            $user->about = $request->about;
            $user->e_ktp = $request->e_ktp;
            $user->bank = $request->bank;
            if($user->hasRole(['admin','seller']))
            {
                $user->save();
                return response()->json([
                    'status' => 'Your Shops Updated Succesfully',
                    'user' => $user
                ]);
            }
            else
            {
            $user->save();
            $user->assignRole('seller');
            return response()->json([
                'status' => 'Your Shops Updated',
                'message' => 'you become seller',
                'user' => $user
            ]);
            }
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productSeller()
    {
        $user = User::where('id',auth()->guard('api')->id())->first();

        if($user->hasRole(['admin','seller']))
        {
            $product = Product::where('seller_id',auth()->guard('api')->id())->get();
            // return $product;
            return response()->json([
                'status' => 'succes',
                'data' => $product,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function productStore(Request $request)
    {
        $user = User::where('id',auth()->guard('api')->id())->first();
        $dataid = $user->id;
        if($user->hasRole(['admin','seller']))
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
            if($request->hasFile('image'))
            {
                $validate['image'] = $request->file('image')->store('product-image/'.$user->name);
            }
            Product::create($validate);
            return response()->json(['status' => 'product succesfully added']);
        }
        else
        {
            return response()->json(['message' => 'Your Not Allowed To Do This Action']);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productSellerShow($id)
    {
        // $user = User::where('id',auth()->guard('api')->id())->first();

        $product = Product::where('seller_id',auth()->guard('api')->id())->find($id);
        if ($product)
        {
            return response()->json([
                'status' => 'succes',
                'data' => $product
            ]);
        }
        else
        {
            return response()->json(['message' => 'Your Not Allowed To Do This Action']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productUpdate(Request $request, $id)
    {
        $user = User::where('id',auth()->guard('api')->id())->first();

        if($user->hasRole(['admin','seller']))
        {
            $product = Product::find($id);
            if($product->seller_id == auth()->guard('api')->id())
            {
                $validate = $request->validate([
                    "description" => "nullable",
                    "dimension" => "nullable",
                    "seller_id"=> "nullable",
                    "cate_id"=> "nullable",
                    "popular"=> "nullable",
                    "status"=> "nullable",
                    "weight"=> "nullable",
                    "image"=> "nullable",
                    "price"=> "nullable",
                    "color"=> "nullable",
                    "name"=> "nullable",
                    "slug"=> "nullable",
                    "qty"=> "nullable",
                ]);
                if($request->hasFile('image'))
                {
                    Storage::delete($product->image);
                    // return $product;
                    $validate['image'] = $request->file('image')->store('product-image/'.$user->name);
                }
                $product->update($validate);
                return response()->json([
                    'message' => 'Product updated succesfully',
                    'status' => $product
                ]);
            }
            else
            {
            return response()->json(['message' => 'Your Not Allowed To Do This Action']);
            }
        }
        else{
            return response()->json(['message' => 'Your Not Allowed To Do This Action']);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productDestroy($id)
    {
        $product = Product::find($id);
        $user = User::where('id',auth()->guard('api')->id())->first();
        if($user->hasRole(['admin','seller']))
        {
            if($product->seller_id == $user->id)
            {
                return $id;
                if($product['image'] == true)
                {
                    Storage::delete($product->image);
                }
                Product::destroy($id);
                return response()->json(['status' => 'Product Deleted']);
            }
            else
            {
            return response()->json(['message' => 'Your Not Allowed To Do This Action']);
            }
        }
        else{
            return response()->json(['message' => 'Your Not Allowed To Do This Action']);
        }

    }

    public function categoryList()
    {
        $user = User::where('id',auth()->guard('api')->id())->first();
        if($user->hasRole('admin'))
        {
            $category = Categories::all();
            return response()->json([
                'status' => 'succes',
                'data' => $category
            ]);
        }
        else
        {
            return response()->json(['message' => 'You are not admin']);
        }
    }
    public function categoryShow($id)
    {
        $user = User::where('id',auth()->guard('api')->id())->first();

        if(!$user->hasRole('admin'))
        {
            return response()->json(['message' => 'You Are Not Admin']);
        }
        $category = Categories::find($id);
        return response()->json([
            'status' => 'succes',
            'date' => $category
        ]);
    }

    public function categoryAdd(Request $request)
    {
        $user = User::where('id',auth()->guard('api')->id())->first();
        if(!$user->hasRole('admin'))
        {
            return response()->json(['message' => 'You Are Not Admin']);
        }
        $category = new Categories;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->image = $request->image;
        // if($request->hasFile('image'));
        // {
        //    $category = $request->file('image')->store('category-image');
        // }
        $category->save();
        return response()->json(['status' => 'Category aded']);
    }

    public function categoryUpdate(Request $request,$id)
    {
        //
        // return $request;
        //
        $user = User::where('id',auth()->guard('api')->id())->first();
        if(!$user->hasRole('admin'))
        {
            return response()->json(['message' => 'You Are Not Admin']);
        }

        $validate = $request->validate([
            'name' => 'nullable',
            'slug' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable',
        ]);
        // if($request->has('name'))
        // {
            //     $validate = $category->slug = ;
            // }
        $category = Categories::find($id);
        $category->update($validate);
        return response()->json([
            'status' => 'category updated',
            'data' => $category
        ]);
    }

    public function categoryDestroy($id)
    {
        $user = User::where('id',auth()->guard('api')->id())->first();
        if(!$user->hasRole('admin'))
        {
            return response()->json(['message' => 'You Are Not Admin']);
        }
        Categories::destroy($id);
        return response()->json(['status' => 'Categories Deleted']);
    }
}
