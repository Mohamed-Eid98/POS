<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Notifications\CreateOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('customer')->get();
        // return $orders;
// $user=User::all();
// Notification::send($user,new CreateOrder($orders->id));
return view('orders.allorders',compact('orders'));

    }

    public function Paid($id){
        Order::findOrFail($id)->update(['status' => 'Paid' ]);

         $order= Order::findOrFail($id);
        //  $usercreate=User::where('id','!=',Auth::user()->id)->get();
        //   $user=Auth::user()->name;
        //  Notification::send($usercreate,new CreateOrder($order->id,$user));

        return redirect()->route('orders.show');
    }
    public function UnPaid($id){
        Order::findOrFail($id)->update(['status' => 'Pending' ]);
        // return $orders;

        $order= Order::findOrFail($id);
        // $usercreate=User::where('id','!=',Auth::user()->id)->get();
        //  $user=Auth::user()->name;
        // Notification::send($usercreate,new CreateOrder($order->id,$user));

        return redirect()->route('orders.show');
    }
    public function pending(){
        $orders = Order::with('customer')->where('status' , 'Pending')->get();
        return view('orders.allorders',compact('orders'));
    }
    public function delivered(){
        $orders = Order::with('customer')->where('status' , 'Delivered')->get();
        return view('orders.allorders',compact('orders'));
    }
    public function inprograss(){
        $orders = Order::with('customer')->where('status' , 'InProgress')->get();
        return view('orders.allorders',compact('orders'));
    }
    public function rejected(){
        $orders = Order::with('customer')->where('status' , 'Rejected')->get();
        return view('orders.allorders',compact('orders'));
    }
    public function cancelled(){
        $orders = Order::with('customer')->where('status' , 'Cancelled')->get();
        return view('orders.allorders',compact('orders'));
    }
    public function orderPaid(){
        $orders = Order::with('customer')->where('status' , 'Paid')->get();
        return view('orders.allorders',compact('orders'));
    }



}
