<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    function addcoupon()
    {

        return view('coupon.addcoupon');
    }
}
