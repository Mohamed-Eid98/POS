<?php

namespace App\Http\Controllers\Api;



use App\Http\Resources\ProductColorsResource;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColorSize;

use App\Models\ColorProduct;
use Illuminate\Http\Request;
use App\Models\FavouriteProduct;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductDetailResource;
use App\Models\SubCategory;
use App\Models\Category;

use App\Http\Resources\ProductColorSizeResource;
use function App\Helpers\translate;

class ProductController extends Controller
{
    protected $productModel;
    protected $colorProductModel;
    public function __construct(Product $product,ColorProduct $colorProduct)
    {
        $this->productModel = $product;
        $this->colorProductModel=$colorProduct;
    }


    public function productDetail($id)
    {
        $product = $this->colorProductModel::with('product')->wherehas('product',function ($q){
            $q->where('is_active',1);
        })->where('product_id',$id)->first();
        if(!$product){
            return responseApi(403,translate('product Not found'));
        }
        $data= New ProductDetailResource($product);



        return responseApi(200, "product details Found", $data);
    }

    public function productSizeByColor($id ,Request $request)
    {
         $validator = validator($request->all(), [
            'color_id' => 'required|integer'
        ]);

        if ($validator->fails())
            return responseApi(403, $validator->errors()->first());


        $color_id=$request->color_id;
        $product=Product::findOrfail($id);
        $product_Sizes = ProductColorSize::wherehas('colorProduct',function ($q) use ($color_id,$id){
            $q->where('color_id',$color_id)->where('product_id',$id);
        })->get();

        $data['sizes']= ProductColorSizeResource::collection($product_Sizes);
        if($product){
          $data['images'] = $product->getMedia('images')->filter(function ($item) use ($color_id) {
            return $item->getCustomProperty('color_id') == $color_id;
                    })->map(function ($item) {
                        return [
                            'id' => $item->id,
                            'url' => $item->getUrl(),
                        ];
            })->values()->all();

        }
        return responseApi(200, "product details Found", $data);
    }


    public function add_fav_product(Request $request){

        $validator = validator($request->all(), [
            'product_id' => 'required|integer',
        ]);

        if ($validator->fails())
            return responseApi(403, $validator->errors()->first());

        $user = auth()->user();
        if(!$user){
            return responseApi(200, "user not found", []);
        }
        $old_product = FavouriteProduct::where([
            'user_id' => $user->id,
            'product_id' => $request->product_id,
        ])->first();
        $data['is_deleted']=false;
        if($old_product){
            $data['is_deleted']=true;

            $old_product->delete();
            return responseApi(200, "Favourite product deleted",$data);
        }
        FavouriteProduct::create([
            'user_id' => $user->id,
            'product_id' => $request->product_id,
        ]);

        return responseApi(200, "Favourite product added", $data);
    }


    public function get_favourite_products(){

        $user = auth()->user();
        if(!$user){
            return responseApi(403, "user not found");
        }
        $fav_products = FavouriteProduct::where(['user_id'=> $user->id])->pluck('product_id');
        $products = Product::Active()->with('colors')
            ->wherein('id',$fav_products)->simplePaginate(10);

        return responseApi(200, "All favourite products", ProductColorsResource::collection($products));
    }

    public function addMediaNew(Request $request)
    {
        $validator = validator($request->all(), [
            'image' => 'required|Image|mimes:jpeg,jpg,png,gif',//|max:10000',
            'colorId'=>'required',
            'productId'=>'required',
        ]);

        if ($validator->fails())return responseApi('false', $validator->errors()->first());

        $uploadedFile = $request->file('image');
        $product=$this->productModel->find($request->productId);
//        $product=SubCategory::find($request->productId);
        if($product){
            $product->addMedia($uploadedFile)->toMediaCollection('images');
        }


        return responseApi(200, 'image uploaded successfuly');
    }


}
