<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Messages;
use App\Models\Order_list;
use App\Models\Orders
;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{


    public function getChat($partner)
    {
        // return $partner;
        $user = $this->userValidate();
        $outgoing_id = $user->unique_id;
        $incoming_id = $partner;
        $output = "";
        $chat = Messages::where('outgoing_msg_id',$outgoing_id)
                        ->where('incoming_msg_id',$incoming_id)
                        ->orWhere('outgoing_msg_id',$incoming_id)
                        ->where('incoming_msg_id',$outgoing_id)->get();
    // return response()->json(['data' => $chat]);
        if($chat){
        foreach($chat as $chats)
        {
            if($chats->outgoing_msg_id == $outgoing_id)
            {
                $output .= '<div class="chat outgoing">
                            <div class="details">
                                <p>'. $chats['msg'] .'</p>
                            </div>
                            </div>';
            }
            else
            {
                $output .= '<div class="chat incoming">
                                <div class="details">
                                    <p>'. $chats['msg'] .'</p>
                                </div>
                                </div>';
            }
        }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        return $output;
    }

    public function sendChat(Request $request)
    {
        // return $request;
        $user = $this->userValidate();
        if(!empty($request->message))
        {
            $messages = new Messages;
            $messages->outgoing_msg_id = $user->unique_id;
            $messages->incoming_msg_id = $request->incoming_id;
            $messages->msg = $request->message;
            $messages->save();
            // return response()->json(['mesage' => $messages]);
        }

    }

    public function Chat($name)
    {
        $user = User::where('name',$name)->first();
        return view('dashboard.chat-app.dashboard-chatt',compact('user'));
    }

    public function myOrder()
    {
        $user = $this->userValidate();
        $myorder = Order_list::where('user_id',$user->id)->get();
        // $orders = Orders::where('track_code',$myorder->track_code)->get();
        // return $order;
        return view('dashboard.order.myorder-list',compact(['myorder']));
    }

    public function myOrderDetail($id)
    {
        $user = $this->userValidate();
        $orders = Orders::where('user_id',$user->id)->find($id);
        // dd( $orders);
        return view('dashboard.order.myorder-detail',compact(['orders']));
    }

    public function myOrderCancel($id)
    {
        $user = $this->userValidate();
        $orders = Orders::where('user_id',$user->id)->find($id);
        if($orders)
        {
            Orders::destroy($id);
            return response()->json(['message' => 'orders has been canceled']);
        }
    }

    public function orderTakeMoney(Request $request, $id)
    {
        $user = $this->userValidate();
        $user->wallet = $request->wallet;
        $user->update();


        Orders::destroy($id);
        return response()->json(['message' => 'your item has benn sold']);
    }

    public function myOrderConfirm($id)
    {
        $user = $this->userValidate();
        $orders = Orders::where('user_id',$user->id)->find($id);
        $orders->status = "completed";
        $orders->update();
        return response()->json([
            'message' => 'orders confirmed',
            'orders' => $orders
        ]);
    }

    public function orderList()
    {
        $user = $this->userValidate();
        if($user->hasRole(['seller','admin']))
        {
            $order = Orders::where('seller_id',Auth::id())->get();
            return view('dashboard.order.order-list',compact(['order']));
        }
    }

    public function orderSend($id)
    {
        $user = $this->userValidate();
        if($user->hasRole(['seller','admin']))
        {
            $order = Orders::find($id)->where('seller_id',Auth::id())->first();
            $order->status = "on the way";
            $order->update();
            return response()->json([
                'message' => 'orders updated',
                'data' => $order
            ]);
        }
    }

    public function orderDetails($id)
    {
        $user = $this->userValidate();
        if($user->hasRole(['seller','admin']))
        {
            $orders = Orders::find($id);
            return view('dashboard.order.order-details',compact(['orders']));
        }
    }

    public function userList()
    {
        $user = $this->userValidate();
        if($user->hasRole('admin'))
        {
            $users = User::all();
            return view('dashboard.user.user-list',compact('users'));
        }
        else{
            return response()->json(['message' => 'you are not admin']);
        }
    }

    public function userDestroy($id)
    {
        $user = $this->userValidate();
        if($user->hasRole('admin'))
        {
            User::destroy($id);
            return response()->json(['message' => 'User Deleted']);
        }
    }

    public function wallet()
    {
        $user = $this->userValidate();
        return view('dashboard.dashboard-wallet',compact('user'));
    }

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
            if($user->hasRole(['admin','seller']))
            {
                return response()->json(['status' => 'Your Shops Updated']);
            }
            $user->assignRole('seller');
            return response()->json(['status' => 'Your Shops Updated You Become Seller']);
        }
        else{
            return response()->json(['status' => 'Ada yang salah']);

        }
    }

    public function userValidate()
    {
       return User::where('id',Auth::id())->first();
    }
}
