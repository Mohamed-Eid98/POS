<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IvoicesController extends Controller
{
    public function adddata(){
        return view('invoices.');
        }
public function showtable(){
return view('invoices.invoices');
}
}
