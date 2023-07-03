<?php

namespace App\Http\Resources;

use App\Models\Color;
use App\Models\ProductColorSize;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $color=$this->color;
        $size=$this->size;
        $product=$this->product;
        $image=null;
        $imageMedia = $product->getFirstMedia('images', ['color_id' =>  $this->color_id]);
        if ($imageMedia) {
            $image = $imageMedia->getUrl();
        }
        return  [
            'id'                    => $this->id,
            'product_id'            => $product->id,
            'product_image'                 => $image,
            'product_name'                  => $product != null ? $product->name : $this->product_name,
            'product_code'                  => $product->code??null,
            'price_item'                 => (float)$this->price_item,
            "profit"                => (float)$this->profit,
            "total_price"                =>(float)($this->total_price),
            "total_profit"                =>(float)($this->total_profit),
            "quantity"            => (float)$this->quantity,
            "color_id"              => $color->id??null,
            "color_name"            => $color->name??null,
            "hexa"                  => $color->hexa??null,
            "size_id"              => $size->id??null,
            "size_name"            => $size->name??null,

            ];

    }


}
