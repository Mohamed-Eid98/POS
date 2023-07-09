<?php

namespace App\Http\Resources;

use App\Models\Color;
use App\Models\ProductColorSize;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductColorsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $color=$this->colors->first();
        $productColorSizes =$this->colorProducts->first()->productColorSizes;
        $image = null;
        $imageMedia = $this->getFirstMedia('images', ['color_id' => $color->id]);
        if ($imageMedia) {
            $image = $imageMedia->getUrl();
        }
        return  [
            'id'                    => $this->id,
            "color_id"              => $color->id,
            "hexa"                  => $color->hexa,
            'name'                  => $this->name,
            'description'           => $this->description,
            'price'                 => $this->price_after_discount,
//            'price_before_discount' => $this->price,
            'min_price'             => $this->min_price,
            'repeat_times'          => $this->repeat_times,
            'increase_ratio'        => $this->increase_ratio,
            'max_price'             => $this->min_price + ( $this->increase_ratio * ($this->repeat_times + 1) ),
            'image'                 => $image,
            "is_new"                => $this->is_new,
            "is_on_sale"            => $this->is_on_sale,
            "is_new_arrival"        => $this->is_new_arrival,
            "is_best_seller"        => $this->is_best_seller,
            'offer'                 => new ProductResource($this->ProductOffer),
            'color_count'           => $this->colors->count(),
            'is_favourite'   => $this->is_favourite(),
            'product_color_size'    => ProductColorSizeResource::collection($productColorSizes),
        ];

    }


}
