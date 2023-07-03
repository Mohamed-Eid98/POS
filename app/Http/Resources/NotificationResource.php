<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $description=null;
        $title=$this->title;
        $image=null;
        if($this->type == 'Notice' ){
         $product =  $this->product;
            if($product){
                $description=$product->description;
                $title=$product->name;

                $color=$product->colors->first();
                if($color){
                    $imageMedia = $product->getFirstMedia('images', ['color_id' => $color->id]);
                }
                if ($imageMedia) {
                    $image = $imageMedia->getUrl();
                }
            }
        }

        return [
            'id'=>$this->id,
            'title'=>$title,
            'type'=>$this->type,
            'typeNotice'=>$this->typeNotice,
            'type_id'=>$this->type_id,
            'description'=>$description,
            'image'=>$image,
            'is_show'=>$this->isShow(),
            "date_at"              =>  $this->created_at->format('Y-m-d'),
            "time_at"              =>  $this->created_at->format('h:i a'),
        ];
    }
}
