<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    function addcoupon()
    {

        return view('coupon.addcoupon');
    }
    function showcoupon()
    {

        $coupons = Coupon::get();
        return view('coupon.showcoupon' , compact('coupons'));
    }
    function coupon_update(Request $request)
    {

        $request->validate([
            'end_date' => 'after_or_equal:today',
        ]);

        Coupon::insert([
            'name' => $request->name,
            'code' => $request->code,

            'discount' => $request->discount,
            'type_discount' => $request->type_discount,

            'min_price' => $request->min_price,
            'max_price' => $request->max_price,
            'limit' => $request->limit,
            'limit_user' => $request->limit_user,

            'end_date' => $request->end_date,
            'is_active' => $request->is_active,


        ]);


    session()->flash('add', 'تم اضافة الكوبون بنجاح ');

    return redirect()->back();
    }

    public function updateStatus(Request $request, $id)
    {

        $coupon = Coupon::findOrFail($id);
        $coupon->is_active = $request->input('is_active');
        $coupon->save();

        session()->flash('edit', 'تم تعديل الكوبون بنجاح ');


        return response()->json(['success' => true]);
    }
    public function coupon_delete($id)
    {

        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        session()->flash('delete', 'تم حذف الكوبون بنجاح ');


        return redirect()->back();
    }


}
