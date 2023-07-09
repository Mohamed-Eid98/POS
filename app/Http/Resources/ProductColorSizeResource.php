<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductColorSizeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $size=$this->size;
        return [
          'id' =>$this->id,
          'size'=>  $size? $size->name:'',
          'is_stock'=> $this->is_stock,
        ];
    }
}
