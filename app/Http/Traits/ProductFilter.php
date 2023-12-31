<?php


namespace App\Http\Traits;

use App\Models\ColorProduct;
use App\Models\Product;

trait ProductFilter
{
    protected  function products()
    {
        $query = Product::Active()->with('colors')->when(request('search'), function ($q, $search) {
            return $q->where('name', 'LIKE', '%'. $search .'%');

        });

        $query->when(request('is_new'), function ($q, $is_new) {
            return $q->where('is_new',$is_new);
        });

        $query->when(request('is_new_arrival'), function ($q, $is_new_arrival) {
            return $q->where('is_new_arrival',$is_new_arrival);
        });

        $query->when(request('is_new_arrival'), function ($q, $is_new_arrival) {
            return $q->where('is_new_arrival',$is_new_arrival);
        });

        $query->when(request('is_on_sale'), function ($q, $is_on_sale) {
            return $q->where('is_on_sale',$is_on_sale);
        });



        $query->when(request('max_price'), function ($q, $max_price) {
                return $q->where('price','<=',$max_price);

        });

        $query->when(request('min_price'), function ($q, $min_price) {
            return $q->where('price','>=',$min_price);

    });



        $query->when(request('offers'), function ($q) {
            return $q->whereHas('productOffer',function($offername) {
                return $offername->where('status',1);
               });

        });


        return $query->simplePaginate(15);
    }
}
