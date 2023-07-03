<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\IconResource;
use App\Http\Resources\InfoResource;
use App\Http\Resources\PackageResource;
use App\Models\ContactUs;
use App\Models\Icon;
use App\Models\Info;
use App\Models\Package;
use App\Utils\Util;
use App\Models\Area;
use App\Models\City;
use App\Models\Slider;
use App\Models\Country;
use Illuminate\Http\Request;
use function App\Helpers\translate;
use App\Http\Controllers\Controller;
use App\Http\Resources\AreaResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\CountryResource;

class GeneralController extends Controller
{

    protected $count_paginate = 10;
    protected $sliderModel;

    public function __construct(Slider $slider)
    {
        $this->sliderModel=$slider;

    }


    public function countries(Request $request){
        $count_paginate=$request->count_paginate?:$this->count_paginate;
        $countries= Country::orderBy('sort', 'desc')->simplePaginate($count_paginate);

        return responseApi(200,translate('return_data_success'), CountryResource::collection($countries));
    }
    public function cities(Request $request){
        $validator = validator($request->all(), [
            'country_id' => 'nullable|integer|exists:countries,id',
        ]);
        if ($validator->fails())
            return responseApi(403, $validator->errors()->first());

        $count_paginate=$request->count_paginate?:$this->count_paginate;
        $cities= City::orderBy('sort', 'desc');
        if($request->has('country_id')){
            $cities=$cities->where('country_id',$request->country_id);
        }
        $cities=  $cities->simplePaginate($count_paginate);

        return responseApi(200,translate('return_data_success'), CityResource::collection($cities));
    }
    public function icons(){

        $data['icons']=  IconResource::collection(Icon::get());
        $data['packages']= PackageResource::collection( Package::get());

        return responseApi(200,translate('return_data_success'),$data);
    }

    public function areas(Request $request){
        $validator = validator($request->all(), [
            'city_id' => 'nullable|integer|exists:cities,id',
        ]);
        if ($validator->fails())
            return responseApi(403, $validator->errors()->first());

        $count_paginate=$request->count_paginate?:$this->count_paginate;
        $areas= Area::orderBy('sort', 'desc');
        if($request->has('city_id')){
            $areas=$areas->where('city_id',$request->city_id);
        }
        $areas=  $areas->simplePaginate($count_paginate);

        return responseApi(200, translate('return_data_success'), AreaResource::collection($areas));
    }
    public function infos(Request $request){
        $validator = validator($request->all(), [
            'type' => 'required|string|in:WhoAreWe,termsOfService,privacyPolicy,FAQ,ReturnPolicy,WarrantyPolicy,DeliveryPolicy',
        ]);
        if ($validator->fails())
            return responseApi(405, $validator->errors()->first());

        $Info= Info::where('type',$request->type)->first();



        return responseApi(200,translate('return_data_success'), new InfoResource($Info));
    }

    public function contactUs(Request $request){

        $validator = validator($request->all(), [
            'name' => 'required|string|max:50',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:150',
            'note' => 'required|string|max:1000',
        ]);

        if ($validator->fails())
            return responseApi(405, $validator->errors()->first());

        ContactUs::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'note' => $request->note,
        ]);

        return responseApi(200,translate('Your message has been successfully received, and we will get back to you as soon as possible. Thank you for contacting us.'));
    }
    public function updateVersion(Request $request){
        $validator = validator($request->all(), [
            'device_type' => 'required|string|in:IOS,Android',
        ]);
        if ($validator->fails())
            return responseApi(405, $validator->errors()->first());

//        \Settings::set('update_version_IOS', '1.0');
//        \Settings::set('update_version_Android', '1.0');

        $data['latest']= \Settings::get('update_version_'.$request->device_type);

        return responseApi(200, translate('return_data_success'),$data);

    }
}

