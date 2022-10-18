<?php

namespace App\Http\Controllers\Web;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    public function Index()
    {
        $categories = Categories::all();
        return view('dashboard.categories.category-list',compact('categories'));
    }

    public function Store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'slug' => 'required',
            'popular' => 'nullable',
            'image' => 'image|file|nullable',
        ]);
        // @dd($request);
        if($request->hasFile('image'))
        {
            $validate['image'] = $request->file('image')->store('categories-image');
        }
        Categories::create($validate);
        return redirect('dashboard-page')->with('status','Category Added');
    }

    public function Add()
    {
        return view('dashboard.categories.category-add');
    }

    public function Edit($slug)
    {
        $category = Categories::where('slug',$slug)->get()->first();
        return view('dashboard.categories.category-edit',compact(['category']));
    }

    public function Update(Request $request,$id)
    {
        $validate = $request->validate([
            'description' => 'required',
            'popular' => 'nullable',
            'image' => 'image|file|nullable',
            'name' => 'required',
            'slug' => 'required',
        ]);
        if($request->hasFile('image'))
        {
            if($request->oldimage)
            {
                Storage::delete($request->oldimage);
            }
            $validate['image'] = $request->file('image')->store('categories-image');
        }
        $categories = Categories::find($id);
        $categories->update($validate);
        // dd($categories,$validate);
        return redirect('dashboard-page')->with('status','Data Updated');
    }

    public function Destroy($id)
    {
        $delete = Categories::find($id);
        if($delete['image'] == true)
        {
            Storage::delete($delete->image);
        }
        Categories::destroy($id);
        return redirect('dashboard-page');
    }
}
