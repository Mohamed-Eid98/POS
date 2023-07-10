<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    function addslide()
    {

        return view('slides.addslides');
    }
    function showslides()
    {


        $sliders = Slider::get();
        // $products = $sliders->type_id;
        // $productss = Product::find([$products]);
        // return $sliders;
        return view('slides.showslides' , compact('sliders'));
    }
    function update_slide(Request $request)
    {
        // return $request;

            $image = $request->file('pic');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $path = 'uploads/Sliders/';
            $save_url = 'uploads/Sliders/'.$name_gen;
            $image->move($path, $save_url);
            $typeIds = json_encode($request->type_id);

            Slider::insert([
                'type' => $request->type,
                'type_id' => $typeIds ,
                'sort' => $request->sort,
                'image' => $save_url,
            ]);


        session()->flash('add', 'تم اضافة البانر بنجاح ');

        return redirect()->back();
    }
    public function getOptions(Request $request, $type)
    {
        $type = $request->input('type');
        if ($type === 'Category') {
          $options = Category::all();
        } else {
          $options = Product::all();
        }
        return response()->json($options);
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        if($slider->image){

            $image = $slider->image;
            unlink($image);
        }
        Slider::find($id)->delete();

        session()->flash('delete', 'تم حذف الرابط بنجاح ');
        return redirect()->back();
    }

}
