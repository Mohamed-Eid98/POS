<?php

namespace App\Http\Controllers\Api;



use App\Http\Resources\CartResource;
use App\Http\Resources\ProductColorsResource;
use App\Models\Cart;
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

class CartController extends Controller
{
    protected $productModel;
    protected $colorProductModel;
    public function __construct(Product $product,ColorProduct $colorProduct)
    {
        $this->productModel = $product;
        $this->colorProductModel=$colorProduct;
    }


    public function index(){

        $user = auth()->user();
        if(!$user){
            return responseApi(403, "user not found");
        }
        $products = Cart::with('product','color','size')
            ->wherehas('product')->wherehas('color')
            ->where('user_id', $user->id)
            ->get();

        return responseApi(200, "All carts products", CartResource::collection($products));
    }

    public function storeOrUpdate(Request $request){

        $validator = validator($request->all(), [
            'product_id' => 'required|integer',
            'color_id' => 'required|integer',
            'size_id' => 'nullable|integer',
            'profit' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        if ($validator->fails())
            return responseApi(403, $validator->errors()->first());

        $user = auth()->user();
        if(!$user){
            return responseApi(403, "user not found");
        }


        $Product=Product::find($request->product_id);
        if(!$Product){
            return responseApi(403, "product not found");
        }
        $max_price = $Product->min_price + ($Product->increase_ratio * ( $Product->repeat_times+1));
        if($Product->min_price > $request->profit || $max_price < $request->profit){
            return responseApi(403, "The profit must be between the maximum and minimum profit margins for the product.");
        }

        $p=ColorProduct::where('product_id' , $request->product_id)->where('color_id' ,  $request->color_id)
            ->first();

        if(!$p){
            return responseApi(403, translate('Requested quantity is currently unavailable'));
        }
        if($request->has('size_id')){
            $quantity=ProductColorSize::where('color_product_id' , $p->id)
                ->where('size_id' , $request->size_id)->sum('is_stock');

            if($quantity < $request->quantity){
                return responseApi(403, translate('Requested quantity is currently unavailable'));
            }
        }


        Cart::updateOrCreate([
            'user_id' => $user->id,
            'product_id' => $request->product_id,
            'color_id' => $request->color_id,
            'size_id' => $request->size_id,
        ],[
            'profit' => $request->profit,
            'quantity' => $request->quantity,
        ])->first();

        return responseApi(200, translate("the cart has been updated successes"), []);
    }
    public function RemoveItem(Request $request){

        $validator = validator($request->all(), [
            'product_id' => 'required|integer',
            'color_id' => 'required|integer',
            'size_id' => 'nullable|integer'
        ]);

        if ($validator->fails())
            return responseApi(403, $validator->errors()->first());

        $user = auth()->user();
        if(!$user){
            return responseApi(403, "user not found");
        }

        $cart=Cart::where([
            'user_id' => $user->id,
            'product_id' => $request->product_id,
            'color_id' => $request->color_id,
            'size_id' => $request->size_id,
        ])->first();
        if(!$cart){
            return responseApi(403, translate("This product does not exist in the cart."));
        }

        $cart->delete();
        return responseApi(200, translate("the cart has been deleted successes"), []);
    }
    public function RemoveAll(Request $request){

        $user = auth()->user();
        if(!$user){
            return responseApi(403, "user not found");
        }


        Cart::where('user_id' , $user->id)->delete();

        return responseApi(200, translate("The cart has been emptied successfully."), []);
    }



}
