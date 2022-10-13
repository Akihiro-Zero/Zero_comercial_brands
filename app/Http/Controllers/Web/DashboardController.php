<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function Index()
    {
        return view('dashboard.dashboard-index');
    }

    public function Profile()
    {
        $user = User::where('id',Auth::id())->get()->first();
        return view('dashboard.dashboard-profile',compact(['user']));
    }

    public function Update(Request $request, $id)
    {
        $validate = $request->validate([
            'firstname' => 'nullable',
            'lastname' => 'nullable',
            'postcode' => 'nullable',
            'country' => 'nullable',
            'adress' => 'required',
            'phone' => 'nullable',
            'about' => 'nullable',
            'image' => 'image|file|nullable',
            'city' => 'nullable'


        ]);
        if ($request->hasFile('image'))
        {
            if($request->oldimage)
            {
                Storage::delete($request->oldimage);
            }
            $validate['image'] = $request->file('image')->store('profile-images');
        }
        $user = User::find($id);
        $user->update($validate);

        // dd($user,$validate);
        // return $user;
        view('dashboard.dashboard-index')->with('status','User Profile Updated');
    }

    public function register()
    {
        $user = User::find(Auth()->id());
        return view('dashboard.dashboard-seler-register',compact(['user']));
    }

    public function sellerUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $user->shop_name = $request->shop_name;
        $user->shop_slug = Str::slug($request->shop_name);
        $user->rekening = $request->rekening;
        $user->about = $request->about;
        $user->e_ktp = $request->e_ktp;
        $user->bank = $request->bank;
        if($user->save())
        {
            $user->assignRole('seller');
            return response()->json(['status' => 'Your Own Shops Updated']);
        }
        else{
            return response()->json(['status' => 'Ada yang salah']);

        }
    }
}
