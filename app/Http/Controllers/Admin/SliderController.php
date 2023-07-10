<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    function addslide()
    {

        return view('slides.addslides');
    }
    function showslides()
    {

        return view('slides.showslides');
    }
}
