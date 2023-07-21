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


        $profit_jan = DB::table('orders')->whereMonth('created_at' , '01')->sum('profit_total');
        $profit_feb = DB::table('orders')->whereMonth('created_at' , '02')->sum('profit_total');
        $profit_mar = DB::table('orders')->whereMonth('created_at' , '03')->sum('profit_total');
        $profit_apr = DB::table('orders')->whereMonth('created_at' , '04')->sum('profit_total');
        $profit_may = DB::table('orders')->whereMonth('created_at' , '05')->sum('profit_total');
        $profit_june = DB::table('orders')->whereMonth('created_at' , '06')->sum('profit_total');
        $profit_jul = DB::table('orders')->whereMonth('created_at' , '07')->sum('profit_total');
        $profit_aug = DB::table('orders')->whereMonth('created_at' , '08')->sum('profit_total');
        $profit_sep = DB::table('orders')->whereMonth('created_at' , '09')->sum('profit_total');
        $profit_oct= DB::table('orders')->whereMonth('created_at' , '10')->sum('profit_total');
        $profit_nov= DB::table('orders')->whereMonth('created_at' , '11')->sum('profit_total');
        $profit_dec= DB::table('orders')->whereMonth('created_at' , '12')->sum('profit_total');
        $profit_total = DB::table('orders')->sum('profit_total');

        $profit_months = [ $profit_jan , $profit_feb ,  $profit_mar, $profit_apr, $profit_may, $profit_june ,$profit_jul, $profit_aug,
        $profit_sep, $profit_oct , $profit_nov, $profit_dec];

        $profit_data= array_map(function($value) use ($orders) {

            return $value;

        }, $profit_months);


        return view('analysis.publicview', compact('data' , 'profit_data'));
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
