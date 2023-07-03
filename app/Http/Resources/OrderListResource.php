<?php

namespace App\Http\Resources;

use App\Models\Color;
use App\Models\ProductColorSize;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $customer=$this->customer;

        return  [
            'id'                    => $this->id,
            'status'                  => $this->status,
            'invoice_no'                  => $this->invoice_no,
            'invoice_delivery'                  => $this->invoice_delivery,
            'grand_total'                  => (float)$this->grand_total,
            'sum_quantity_product'  => (float)$this->order_items_sum_quantity,
            'customer_name'                 => $customer->price_after_discount,
            'customer_city'                 => new CityResource($customer->city),
            'customer_area'                 => new CityResource($customer->area),
            "total_profit"                => (float)$this->profit_total,
            "profits_status"                => $this->profits_status(),
            "created_at"              =>  $this->created_at->format('Y-m-d h:i a'),


        ];

    }


}
