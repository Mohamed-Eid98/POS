<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $images = [];
        $all_images=[];

        foreach($this->product->colors as $color ){
            $imageMedia = $this->product->getFirstMedia('images', ['color_id' => $color->id]);
                $images ['color_id'] = $color->id;
                $images ['image'] = null;
                $images ['is_stock'] = $color->pivot->is_stock;
                if ($imageMedia) {
                    $images ['image'] = $imageMedia->getUrl();
                }
                array_push($all_images,$images);
        }
        $list_profits = [];
        $repeat_times = $this->product->repeat_times + 1;
        $min_price=$this->product->min_price;
        $increase_ratio = $this->product->increase_ratio;

        for ($i = 0; $i <= $repeat_times; $i++) {
            $price =$min_price + ($i * $increase_ratio);
            $list_profits[] = $price;
        }
         return [

            'id'             => $this->id,
            'name'           => $this->product->name,
            'description'    => $this->product->description,
            'code_product'   => $this->product->code,
            'is_favourite'   => $this->product->is_favourite(),
            'subCategory'   => new SubCategoryResource ($this->product->subCategory),
            'price'                 => $this->product->price_after_discount,
            'price_before_discount' => $this->product->price,
            'min_price'      =>$min_price,
            'list_profits'   =>$list_profits,
            'max_price'      => $this->product->min_price + ($this->product->increase_ratio * ($this->product->repeat_times+1)),
            'images'         => $all_images,
            'product_color_size'=> ProductColorSizeResource::collection($this->productColorSizes),

        ];
    }
}
