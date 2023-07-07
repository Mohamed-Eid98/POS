<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function addemployee()
    {
        return view('employee.addemployeerole');
    }
    public function showemployee()
    {
        return view('employee.showemployee');
    }
    public function addnewemployee()
    {
        return view('employee.addnewemployee');
    }
}
