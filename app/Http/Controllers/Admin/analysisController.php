<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class analysisController extends Controller
{
    public function publicview()
    {

        $orders_jan = DB::table('orders')->whereMonth('created_at' , '01')->count();
        $orders_feb = DB::table('orders')->whereMonth('created_at' , '02')->count();
        $orders_mar = DB::table('orders')->whereMonth('created_at' , '03')->count();
        $orders_apr = DB::table('orders')->whereMonth('created_at' , '04')->count();
        $orders_may = DB::table('orders')->whereMonth('created_at' , '05')->count();
        $orders_june = DB::table('orders')->whereMonth('created_at' , '06')->count();
        $orders_jul = DB::table('orders')->whereMonth('created_at' , '07')->count();
        $orders_aug = DB::table('orders')->whereMonth('created_at' , '08')->count();
        $orders_sep = DB::table('orders')->whereMonth('created_at' , '09')->count();
        $orders_oct= DB::table('orders')->whereMonth('created_at' , '10')->count();
        $orders_nov= DB::table('orders')->whereMonth('created_at' , '11')->count();
        $orders_dec= DB::table('orders')->whereMonth('created_at' , '12')->count();
        $orders = DB::table('orders')->count();
        // return $orders_june;
        $multiplicationFactor = 100;

        $monthes = [ $orders_jan , $orders_feb ,  $orders_mar, $orders_apr, $orders_may, $orders_june ,$orders_jul, $orders_aug,
        $orders_sep, $orders_oct , $orders_nov, $orders_dec];

        $data = array_map(function($value) use ($orders) {
            if( $value < 1) {
                return $value;
            }else{
                $test = ($value/$orders) *100;
                return ceil($test);
            }
        }, $monthes);




        return view('analysis.publicview', compact('data'));
    }
    public function storage()
    {
        $products = Product::orderBy('name', 'ASC')->get();

        return view('analysis.storage', compact('products'));
    }
    public function Delete($id)
    {

        // $product = Product::findOrfail($id);

        Product::find($id)->delete();
        session()->flash('delete', 'تم حذف المنتج بنجاح ');

        return redirect()->back();
    }
}
