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
        $countries = Country::orderBy('general_title' , 'ASC')->get();
        return view('city.cityAdd' , compact('countries'));
    }
    function AddArea(){
        $cities = City::orderBy('general_title' , 'ASC')->get();
        return view('city.areaAdd' , compact('cities'));
    }


    public function Store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'cate_id' => 'required',
        ],[

            'name.required' =>'يرجي ادخال اسم المحافظه',
            'name.unique' =>'هذه المحافظه مسجل مسبقا',
            'cate_id.required' =>'يرجي اختيار البلد ',
        ]);


        City::create([
            'general_title' => $request->name,
            'country_id' => $request->cate_id,
            'sort' => 1,
        ]);


    session()->flash('Add', 'تم اضافة المحافظه بنجاح ');

    return redirect()->back();
}


public function CityStore(Request $request)
{
    $request->validate([
        'name' => 'required|unique:categories|max:255',
        'cate_id' => 'required',
        'price' => 'required',
    ],[

        'name.required' =>'يرجي ادخال اسم المنطقه',
        'price.required' =>'يرجي ادخال سعر التوصيل',
        'name.unique' =>'هذه المنطقه مسجل مسبقا',
        'cate_id.required' =>'يرجي اختيار المحافظه ',
    ]);


    Area::create([
        'general_title' => $request->name,
        'city_id' => $request->cate_id,
        'shipping_cost' => $request->price,
        'sort' => 1,
    ]);


session()->flash('Add', 'تم اضافة المنطقه بنجاح ');

return redirect()->back();
}

public function Show()
{
    $countries = Country::with('cities')->whereHas('cities')->get();
    // return $countries;
    return view('city.cityView' , compact( 'countries'));
}

public function ShowArea()
{
    $cities = City::with('country' , 'areas')->whereHas('areas')->get();
    // return $cities;
    return view('city.areaView' , compact( 'cities'));
}


}
