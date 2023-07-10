<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{


    function index()
    {

        $users = User::with('customers')->get();

        // return $users;
        return view('customers.users_view', compact('users'));
    }
    function showcustomer($id)
    {

        $user = User::with('customers')->find($id);
        //  return $customers;
        return view('customers.customers_view', compact('user'));
    }
    function showuserorder($id)
    {

        $orders = Order::where('user_id', $id)->where('status', 'Delivered')->get();
        //  return $orders;
        return view('customers.ordercustomer_view', compact('orders'));
    }
    public function paymentsStore(Request $request)
    {

        // return $request;
        $request->validate([
            'name' => 'required',
            
        ], [

            'name.required' => 'يرجي اختيار فاتوره ',
        ]);

        $user_id = $request->user_id;
        $data = request()->input('name');

        if ($request->date_at) {
            $payment_id = DB::table('payments')->insertGetId([
                'date_at' => $request->date_at,
                'invoice_no' => uniqid(),
            ]);
        } else {
            $payment_id = DB::table('payments')->insertGetId([
                'date_at' => now(),
                'invoice_no' => uniqid(),
                'price' => $request->total,
                'created_at' => now()
            ]);
        }

        foreach ($data as $key => $value) {
            DB::table('orders')->where('id', $key)->update(['status' => 'Paid']);
            DB::table('order_payments')->insert([
                'order_id' => $key,
                'payment_id' => $payment_id,
            ]);
        }



        session()->flash('edit', 'تم الدفع');
        return redirect()->back();
    }









    function delete($id)
    {

        $users = User::find($id)->delete();
        // return $customers;
        session()->flash('delete', 'تم حذف الموزع بنجاح ');

        return redirect()->route('customers.show');
    }
}
