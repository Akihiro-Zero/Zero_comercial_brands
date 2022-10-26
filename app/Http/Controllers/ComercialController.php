<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Ratings;
use App\Models\Categories;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $ratings = Ratings::where('prod_id',$product->id)->get();
        $rating_avg = Ratings::where('prod_id',$product->id)->sum('stars_rated');
        if($rating_avg)
        {
            $rating_sum = $rating_avg;
        }
        else{
            $rating_sum = 0;
        }
        $user_rating = Ratings::where('prod_id',$product->id)->where('user_id',Auth::id())->first();
        $reviews = Reviews::where('prod_id',$product->id)->get();
        $user_review= Reviews::where('prod_id',$product->id)->where('user_id',Auth::id())->first();
        if($ratings->count() > 0)
        {
            $rating_value = $rating_sum/$ratings->count();
        }
        else
        {
            $rating_value = 0;
        }
        return view('comercial-details',compact(['product','ratings','rating_value','reviews','user_rating','user_review']));
    }

    public function ratingAdd(Request $request)
    {
        // return $request;
        $rating = $request->rating;
        $prod_id = $request->prod_id;

        $rating_exist = Ratings::where('user_id',Auth::id())->where('prod_id',$prod_id)->first();
        if ($rating_exist) {
            $rating_exist->stars_rated = $rating;
            $rating_exist->update();

            $review = Reviews::where('user_id',Auth::id())->where('prod_id',$prod_id)->first();
            $review->user_review = $request->comment;
            $review->update();
            return response()->json(['message' => 'Ratings Update']);
        }
        else{
            Ratings::create([
                'user_id' => Auth::id(),
                'prod_id' => $prod_id,
                'stars_rated' => $rating
            ]);
            Reviews::create([
                'user_id' => Auth::id(),
                'prod_id' => $prod_id,
                'user_review' => $request->comment
            ]);
            return response()->json(['message' => 'thank you for your rating']);
        }
        if(!$rating_exist){
            return response()->json(['message' => 'Products Unavailable']);
        }
    }
}
