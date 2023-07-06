<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class ComplainController extends Controller
{

    public function addcomplain()
    {
        $complains = Support::get();
        return view('complain.show', compact('complains'));
    }
}
