<?php

namespace App\Http\Controllers\Api;



use App\Http\Resources\CartOrderResource;
use App\Http\Resources\OrderDetailResource;
use App\Http\Resources\OrderListResource;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductColorSize;

use App\Models\ColorProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function App\Helpers\translate;

class OrderController extends Controller
{
    protected $productModel;
    protected $colorProductModel;
    protected $count_paginate = 10;

    public function __construct(Product $product,ColorProduct $colorProduct)
    {
        $this->productModel = $product;
        $this->colorProductModel=$colorProduct;
    }
    public function index(Request $request){

        $user = auth()->user();
        if(!$user){
            return responseApi(403, "user not found");
        }
        $count_paginate=$request->count_paginate?:$this->count_paginate;

        if($request->has('text')){
            $text = str_replace('#', '', $request->text);
            $request->merge([
                'text'=>$text
            ]);
        }

        $data['order_report'] =Order::select(
            DB::raw('SUM(IF(status IN ("Pending", "InProgress"), profit_total, 0)) as total_future_profits'),
            DB::raw('SUM(IF(status = "Delivered", profit_total, 0)) as total_realized_profits'),
            DB::raw('SUM(IF(status = "Paid", profit_total, 0)) as total_received_profits'),
            DB::raw('count(*) as count_all_order'),
        )->first();
        $data['order_counts'] = DB::table('orders')
            ->selectRaw('status, count(*) as order_count')
            ->groupBy('status')
            ->get();
        $order = Order::with(['customer'])->withSum('order_items','quantity')
            ->when($request->has('type'),function ($q) use($request){
                $q->where('status',$request->type);
            })
            ->when($request->has('from_at'),function ($q) use($request){
                $q->whereDate('created_at','>=',$request->from_at);
            })
            ->when($request->has('to_at'),function ($q) use($request){
                $q->whereDate('created_at','<=',$request->to_at);
            })
            ->when($request->has('text'),function ($q) use($request){
                $q->where('invoice_no','like','%'.$request->text.'%')
                    ->orwhere('invoice_delivery','like','%'.$request->text.'%')
                    ->orWhereHas('customer', function ($cq) use ($request) {
                        $cq->where('phone_number', 'like','%'.$request->text.'%')
                            ->orWhere('name', 'like','%'.$request->text.'%');
                    });
            });
        if($request->sortBy == 1){
            $order= $order->simplePaginate($count_paginate);
        }else{
            $order= $order->latest()->simplePaginate($count_paginate);
        }


        $data['order']=OrderListResource::collection($order);
        return responseApi(200, translate('return_data_success'), $data);
    }
    public function ordersCount(Request $request){

        $user = auth()->user();
        if(!$user){
            return responseApi(403, "user not found");
        }
        $data  = DB::table('orders')
            ->selectRaw('status, count(*) as order_count')
            ->groupBy('status')
            ->get();

        return responseApi(200, translate('return_data_success'), $data);
    }

    public function futureProfit(Request $request){

        $user = auth()->user();
        if(!$user){
            return responseApi(403, "user not found");
        }
        $count_paginate=$request->count_paginate?:$this->count_paginate;

        if($request->has('text')){
            $text = str_replace('#', '', $request->text);
            $request->merge([
                'text'=>$text
            ]);
        }

        $data['order_report'] =Order::select(
            DB::raw('SUM(IF(status IN ("Pending", "InProgress"), profit_total, 0)) as total_future_profits'),
            DB::raw('SUM(IF(status = "Delivered", profit_total, 0)) as total_realized_profits'),
            DB::raw('SUM(IF(status = "Paid", profit_total, 0)) as total_received_profits'),
        )->first();
        $order = Order::FutureProfits()->with(['customer'])->withSum('order_items','quantity')
            ->when($request->has('type'),function ($q) use($request){
                $q->where('status',$request->type);
            })->when($request->has('from_at'),function ($q) use($request){
                $q->whereDate('created_at','>=',$request->from_at);
            })
            ->when($request->has('to_at'),function ($q) use($request){
                $q->whereDate('created_at','<=',$request->to_at);
            })
            ->when($request->has('text'),function ($q) use($request){
                $q->where('invoice_no','like','%'.$request->text.'%')
                    ->orwhere('invoice_delivery','like','%'.$request->text.'%')
                    ->orWhereHas('customer', function ($cq) use ($request) {
                        $cq->where('phone_number', 'like','%'.$request->text.'%')
                            ->orWhere('name', 'like','%'.$request->text.'%');
                    });
            });
        if($request->sortBy == 1){
            $order= $order->simplePaginate($count_paginate);
        }else{
            $order= $order->latest()->simplePaginate($count_paginate);
        }


        $data['order']=OrderListResource::collection($order);
        return responseApi(200, translate('return_data_success'), $data);
    }
    public function realizedProfit(Request $request){

        $user = auth()->user();
        if(!$user){
            return responseApi(403, "user not found");
        }
        $count_paginate=$request->count_paginate?:$this->count_paginate;

        if($request->has('text')){
            $text = str_replace('#', '', $request->text);
            $request->merge([
                'text'=>$text
            ]);
        }

        $data['order_report'] =Order::select(
            DB::raw('SUM(IF(status IN ("Pending", "InProgress"), profit_total, 0)) as total_future_profits'),
            DB::raw('SUM(IF(status = "Delivered", profit_total, 0)) as total_realized_profits'),
            DB::raw('SUM(IF(status = "Paid", profit_total, 0)) as total_received_profits'),
        )->first();
        $order = Order::RealizedAndReceivedProfits()->with(['customer'])->withSum('order_items','quantity')
            ->when($request->has('type'),function ($q) use($request){
                $q->where('status',$request->type);
            })->when($request->has('from_at'),function ($q) use($request){
                $q->whereDate('created_at','>=',$request->from_at);
            })
            ->when($request->has('to_at'),function ($q) use($request){
                $q->whereDate('created_at','<=',$request->to_at);
            })
            ->when($request->has('text'),function ($q) use($request){
                $q->where('invoice_no','like','%'.$request->text.'%')
                    ->orwhere('invoice_delivery',$request->text)
                    ->orWhereHas('customer', function ($cq) use ($request) {
                        $cq->where('phone_number', 'like','%'.$request->text.'%')
                            ->orWhere('name', 'like','%'.$request->text.'%');
                    });
            });
        if($request->sortBy == 1){
            $order= $order->simplePaginate($count_paginate);
        }else{
            $order= $order->latest()->simplePaginate($count_paginate);
        }


        $data['order']=OrderListResource::collection($order);
        return responseApi(200, translate('return_data_success'), $data);
    }

    public function show($id){

        $user = auth()->user();
        if(!$user){
            return responseApi(403, "user not found");
        }
        $order=Order::with(['customer','order_items'])->where('id',$id)->first();





        $order=new OrderDetailResource($order);
        return responseApi(200, translate('return_data_success'), $order);
    }
    public function indexCarts(){

        $user = auth()->user();
        if(!$user){
            return responseApi(403, "user not found");
        }
        $products = Cart::with('product','color','size')
            ->wherehas('product')->wherehas('color')
            ->where('user_id', $user->id)
            ->get();
        $data['products']=CartOrderResource::collection($products);

        $sell_query = $this->getSumCartPrice($products);
        $price=$sell_query['total_carts'];
        $total_profit=$sell_query['total_profit'];
        $data['total_order']=[
            'total_price_products'=>$price,
            'total_profit'=>$total_profit,
            'total_price_customer'=>$total_profit+$price,
            'sum_total'=>$total_profit+$price,
        ];
        return responseApi(200,  translate('return_data_success'), $data);
    }

    public function store(Request $request){


        if(!auth()->check())
            return responseApi(403, translate('Unauthenticated user'));


        $validator = validator($request->all(), [
            'customer_id' => 'required|integer|exists:customers,id',
            'coupon_id' => 'nullable|integer',
            'user_shipping_fee' => 'required|numeric',
            'note' => 'nullable|string',
        ]);

        if ($validator->fails())
            return responseApi(403, $validator->errors()->first());



        $carts = Cart::with('product')
            ->where('user_id',auth()->id())
            ->get();

        if ($carts->isEmpty()) {
            return responseApi(403, translate("cart is empty"));
        }
        $Customer=Customer::whereId($request->customer_id)
            ->where('user_id',auth()->id())->first();

        if(!$Customer){
            return responseApi(403, translate("Customer not found"));
        }

        DB::beginTransaction();
        try{
            $sell_query = $this->getSumCartPrice($carts);
            $price=$sell_query['total_carts'];
            $total_profit=$sell_query['total_profit'];
            $shipping_cost=$Customer->area->shipping_cost;
            $discount_type= null;
            $discount_value= 0;
            $discount_amount= 0;
            if($request->has('coupon_id') && $request->coupon_id != 0){
                $response = $this->checkCoupon($request->coupon_id,$price,'id');
                if (!$response['status']){
                    DB::rollBack();
                    return responseApi(405 , $response['msg']);
                }
                $response['item']->update([
                    'use'=>$response['item']->use+1
                ]);
                $discount_type= $response['item']->type_discount;
                $discount_value= $response['item']->discount;
                $discount_amount=$response['discount'];
            }




            $profit_total=$total_profit - $request->user_shipping_fee;
            $order_data=[
                'user_id'=>auth()->id(),
                'customer_id'=>$request->customer_id,
                'discount_type'=> $discount_type,
                'discount_value'=> $discount_value,
                'discount_amount'=> $discount_amount,
                'grand_total'=>$price,
                'profit_total'=>$profit_total,
                'user_shipping_fee'=>$request->user_shipping_fee,
                'shipping_cost'=> $shipping_cost,
                'final_total'=> ($shipping_cost+$price+$profit_total)-$discount_amount,
                'note'=>$request->note,
            ];
            $order=Order::create($order_data);
            $randomNumber = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            $order->invoice_no='O'.$randomNumber.'-'.$order->id;
            $order->save();


            foreach ($carts as $cart){
                $p=ColorProduct::where([
                    'product_id' => $cart->product_id,
                    'color_id' => $cart->color_id
                ])->first();

                if(!$p){
                    DB::rollBack();
                    return responseApi(403, translate('Requested quantity is currently unavailable'));
                }

                ColorProduct::where([
                    'product_id' => $cart->product_id,
                    'color_id' => $cart->color_id
                ])->decrement('is_stock', $cart->quantity);

                if($cart->size_id != null){
                    $quantity=ProductColorSize::where([
                        'color_product_id' => $p->id,
                        'size_id' => $cart->size_id,
                    ])->sum('is_stock');

                    if($quantity < $cart->quantity){
                        DB::rollBack();
                        return responseApi(403, translate('Requested quantity is currently unavailable'));
                    }

                    ProductColorSize::where([
                        'color_product_id' => $p->id,
                        'size_id' => $cart->size_id,
                    ])->decrement('is_stock', $cart->quantity);

                }


                $price_item=$cart->product->price_after_discount;
                $product_name=null;
                $product=Product::find($cart->product_id);
                if($product){
                   $product_name= $product->name;
                }
                OrderProduct::create([
                    'order_id' => $order->id,
                    'size_id' => $cart->size_id,
                    'product_id' => $cart->product_id,
                    'product_name' => $product_name,
                    'color_id' => $cart->color_id,
                    'quantity' => $cart->quantity,
                    'price_item' => $price_item,
                    'profit' => $cart->profit,
                    'total_price' => $cart->quantity*$price_item,
                    'total_profit' => $cart->quantity*$cart->profit,
                ]);


            }
            Cart::where('user_id' ,auth()->id())->delete();
            $data['order_id']= $order->id;
            $data['profit_total']=$profit_total;
            DB::commit();
            return responseApi(200, translate("the cart has been updated successes"),$data);
        }catch (\Exception $exception){
            DB::rollBack();
            Log::emergency('File: ' . $exception->getFile() . 'Line: ' . $exception->getLine() . 'Message: ' . $exception->getMessage());
            return responseApi(500, translate('Something went wrong'));
        }





    }

    public function getShippingCost(Request $request){
        if(!auth()->check())
            return responseApi(403, translate('Unauthenticated user'));


        $validator = validator($request->all(), [
            'customer_id' => 'required|integer|exists:customers,id',
        ]);

        if ($validator->fails())
            return responseApi(403, $validator->errors()->first());

        $user = auth()->user();
        if(!$user){
            return responseApi(403, "user not found");
        }


        $Customer=Customer::whereId($request->customer_id)
            ->where('user_id',auth()->id())->first();

        if(!$Customer){
            return responseApi(403, translate("Customer not found"));
        }
        $shipping_cost= (float)$Customer->area->shipping_cost;
        $data['shipping_cost']=$shipping_cost;
        $shipping_cost_list = [];
        for ($i = 1000; $i <= $shipping_cost; $i += 1000) {
            $shipping_cost_list[] = $i;
        }
        $data['shipping_cost_list'] = $shipping_cost_list;

        return responseApi(200, translate("the cart has been updated successes"), $data);
    }


    public function getCoupon(Request $request)
    {
        if(!auth()->check())
            return responseApi(403, translate('Unauthenticated user'));

        $validator = validator($request->all(), [
            'coupon_code' => 'required|string',
        ]);
        if ($validator->fails())
            return responseApi(405, $validator->errors()->first());
        $products = Cart::with('product')
                            ->where('user_id',auth()->id())
                           ->get();

        $sell_query = $this->getSumCartPrice($products);

        $price=$sell_query['total_carts'];
        $response = $this->checkCoupon($request->coupon_code,$price);
        if ($response['status'])
            return responseApi(200, translate('return_data_success'), ['discount' => $response['discount'] ,'coupon_id'=>$response['item']->id]);

        return responseApi(405 , $response['msg']);
    }
    public function checkCoupon($code,$price,$by='code')
    {
        $date = Carbon::now()->format('Y-m-d');

        $item = Coupon::where($by , $code)->first();
        if ($item) {
            if($item->min_price > $price  ){
                return ['status' => false, 'msg' => translate('Minimum price requirement is not met')];
            }
            if ($item->start_date > $date)
                return ['status' => false, 'msg' => translate('coupon not started')];

            if ($item->start_date > $date || $item->end_date < $date || $item->is_active == 0)
                return ['status' => false, 'msg' => translate('coupon expired')];

            if ($item->coupon_users()->where('user_id', auth('api')->id())->count() >= $item->limit_user)
                return ['status' => false, 'msg' => translate('coupon used before')];

            if ($item->limit <= $item->coupon_users()->count())
                return ['status' => false, 'msg' => translate('coupon expired')];


            $discount=$item->discount;
            if($item->type_discount=="percentage" ){
                $discount=($discount /100)*$price;
            }

            if(  $discount >$item->max_price  ){
                $discount=$item->max_price;
            }

            return ['status' => true,
                'discount' => (float)$discount,
                'item' => $item
            ];
        }
        return ['status' => false, 'msg' => translate('coupon not found')];
    }



    public function getSumCartPrice($carts)
    {
        $sum['total_profit']=0;
        $sum['total_carts']=0;
        foreach ($carts as $cart){
            $sum['total_profit']+=   $cart->profit*$cart->quantity;
            $sum['total_carts']+=   $cart->product->price_after_discount*$cart->quantity;
        }
        return $sum;
    }
}
