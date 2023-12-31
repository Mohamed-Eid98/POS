<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\SubCategory;
use App\Models\ColorProduct;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductColorsResource;

use App\Http\Resources\SubCategoryResource;
use function App\Helpers\translate;

class SubCategoryController extends Controller
{
    protected $count_paginate = 10;

    public function get_all_sub_categories(Request $request){

        $validator = validator($request->all(), [
            "category_id" => 'required|exists:categories,id'
        ]);

        if ($validator->fails())
            return responseApi(403, $validator->errors()->first());

        $sub_categories = SubCategory::with('category')->where('category_id', $request->category_id)->get();
        $sub_categories_response = SubCategoryResource::collection($sub_categories) ;

        $data = $sub_categories_response;
        return responseApi(200, translate("Sub Categories returns successfully"), $data);
    }

    public function get_all_products(Request $request){

        $validator = validator($request->all(), [
            "sub_category_id" => "required|exists:sub_categories,id"
        ]);

        $sub_category_id = $request->sub_category_id;
        $count_paginate = $request->count_paginate ?: $this->count_paginate;

        if ($validator->fails())
            return responseApi(403, $validator->errors()->first());

        $products = Product::Active()->with('colors')->where('sub_category_id',$sub_category_id );
        if($count_paginate == 'ALL'){
            $products = $products->get();
        } else{
            $products = $products->simplePaginate($count_paginate);
        }
        $products = ProductColorsResource::collection($products);

        return responseApi(200, translate('products found'), $products);
    }

}
