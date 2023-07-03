<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

         return [

            'id'                        => $this->id,
            'status'                    => $this->status,
            'invoice_no'                => $this->invoice_no,
            'invoice_delivery'          => $this->invoice_delivery,
            'grand_total'               => (float)$this->grand_total,
            'profit_total'              => (float)$this->profit_total,
            'grand_total_with_profit'   => (float)($this->grand_total + $this->profit_total),
            'discount_amount'           => (float)$this->discount_amount,
            'shipping_cost'             => (float)$this->shipping_cost,
            'final_total'               => (float)$this->final_total,
            'products'                  =>ItemOrderResource::collection($this->order_items),
            'customer'                  => new CustomerResource($this->customer),
            "created_at"              =>  $this->created_at->format('Y-m-d h:i a'),
        ];
    }
}
