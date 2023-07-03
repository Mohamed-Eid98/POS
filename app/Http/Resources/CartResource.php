<?php

namespace App\Http\Resources;

use App\Models\Color;
use App\Models\ProductColorSize;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'image'                 => $image,
            'name'                  => $product->name,
            'price'                 => (float)$product->price_after_discount,
            "color_id"              => $color->id??null,
            "color_name"            => $color->name??null,
            "hexa"                  => $color->hexa??null,
            "size_id"              => $size->id??null,
            "size_name"            => $size->name??null,
            "profit"                => (float)$this->profit,
            "quantity"            => (float)$this->quantity
            ];

    }


}
