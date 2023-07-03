<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    function Add(){
        return view('city.cityAdd');
    }
    public function Store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cities|max:255',
        ],[

            'name.required' =>'يرجي ادخال اسم المحافظه',
            'name.unique' =>'هذه المحافظه مسجله مسبقا',
        ]);


        City::create([
            'general_title' => $request->name,
            'country_id' => 1,
            'sort' => 1,
        ]);


    session()->flash('add', 'تم اضافة المحافظه بنجاح ');

    return redirect()->back();
    }
function Edit($id){
    $city = City::find($id);
    return view('city.city_page', compact('city'));
}

function Update(Request $request){

    $id = $request->id;
    $city = City::find($id);
    $city = City::find($id)->update([
        'general_title' => $request->name,
    ]);


    session()->flash('edit', 'تم تعديل المحافظه بنجاح ');

    return redirect()->route('city.show');

}
function Delete($id){

    $city = City::find($id)->delete();
    session()->flash('delete', 'تم حذف المحافظه بنجاح ');
    return redirect()->back();

}


    function AddArea(){
        $cities = City::orderBy('general_title' , 'ASC')->get();
        return view('city.areaAdd' , compact('cities'));
    }


public function AreaStore(Request $request)
{
    $request->validate([
        'name' => 'required|unique:categories|max:255',
        'city_id' => 'required',
        'price' => 'required',
    ],[

        'name.required' =>'يرجي ادخال اسم المنطقه',
        'price.required' =>'يرجي ادخال سعر التوصيل',
        'name.unique' =>'هذه المنطقه مسجله مسبقا',
        'city_id.required' =>'يرجي اختيار المحافظه ',
    ]);


    Area::create([
        'general_title' => $request->name,
        'city_id' => $request->city_id,
        'shipping_cost' => $request->price,
        'sort' => 1,
    ]);


session()->flash('Add', 'تم اضافة المنطقه بنجاح ');

return redirect()->back();
}

function EditArea($id){

    $cities = City::get();
    $area = Area::find($id);
    return view('city.area_page', compact('cities', 'area'));
}

function UpdateArea(Request $request){

    $id = $request->id;

    Area::find($id)->update([
        'general_title' => $request->name,
        'city_id' => $request->city_id,
        'shipping_cost' => $request->price,
    ]);


    session()->flash('edit', 'تم تعديل المنطقه بنجاح ');

    return redirect()->route('area.show');

}
function DeleteArea($id){

    Area::find($id)->delete();
    session()->flash('delete', 'تم حذف المنطقه بنجاح ');
    return redirect()->back();

}



public function Show()
{
    $cities = City::where('country_id', 1)->get();
    return view('city.cityView' , compact( 'cities'));
}

public function ShowArea()
{
    $cities = City::with('areas')->whereHas('areas')->get();
    return view('city.areaView' , compact( 'cities'));
}


}
