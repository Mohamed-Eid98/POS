<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class analysisController extends Controller
{
    public function publicview()
    {
        return view('analysis.publicview');
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
