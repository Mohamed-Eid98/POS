<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function index(){

        $users = User::with('customers')->get();
        // return $customers;
        return view('customers.customers_view' , compact('users'));
    }
    function delete($id){

        $users = User::find($id)->delete();
        // return $customers;
        session()->flash('delete', 'تم حذف الموزع بنجاح ');

        return redirect()->route('customers.show');

    }
}