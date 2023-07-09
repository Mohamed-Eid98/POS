<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $package = $this->getPackage();
        $city = $this->city;

        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'store_name'=>$this->seller? $this->seller->store_name:null,
            'wallet_number'=>$this->seller?$this->seller->wallet_number:null,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'image'=>$this->getFirstMedia('images') != null ? $this->getFirstMedia('images')->getUrl() : null,
            'address'=>$this->address,
            'lat'=>$this->lat,
            'lang'=>$this->lang,
            'gender' => $this->gender,
            'date_of_birth'=>$this->date_of_birth,
            'is_registerd'=>$this->is_registerd,
            'package_id'=>$package!= null ? $package->id:null,
            'package_name'=>$package!= null ?$package->title :null,
            'city_id'=>$city!= null ? $city->id :null,
            'city_name'=>$city!= null ? $city->general_title :null,
            "created_at"    =>  $this->created_at != null ? $this->created_at->format('Y-m-d h:i a') : null,

        ];
    }
}
