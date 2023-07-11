<?php

namespace App\Http\Resources;

use App\Models\Color;
use App\Models\ProductColorSize;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $formattedDate = Carbon::parse($this->date_at)->format('Y-m-d h:i a');

        return  [
            'id'                    => $this->id,
            'invoice_no'                  => $this->invoice_no,
            'orders_count'                  => $this->orders_count,
            'sum_profit_total'                  => (float)$this->orders_sum_profit_total,
            "created_at"              =>  $formattedDate,



        ];

    }


}
