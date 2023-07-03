<?php

namespace App\Http\Controllers\Api;



use App\Http\Resources\OrderListResource;
use App\Http\Resources\PaymentListResource;
use App\Http\Resources\OrderDetailResource;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;

use App\Models\ColorProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function App\Helpers\translate;

class PaymentController extends Controller
{
    protected $productModel;
    protected $colorProductModel;
    protected $count_paginate = 10;

    public function __construct(Product $product,ColorProduct $colorProduct)
    {
        $this->productModel = $product;
        $this->colorProductModel=$colorProduct;
    }
    public function indexReceived(Request $request){

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
        $order_payments = Payment::with(['orders'])->withSum('orders','profit_total')
            ->withCount('orders')
            ->when($request->has('from_at'),function ($q) use($request){
                $q->whereDate('date_at','>=',$request->from_at);
            })
            ->when($request->has('to_at'),function ($q) use($request){
                $q->whereDate('date_at','<=',$request->to_at);
            })
            ->when($request->has('text'),function ($q) use($request){
                $q->where('invoice_no','like','%'.$request->text.'%')
                    ->orWhereHas('orders', function ($cq) use ($request) {
                        $cq->where('invoice_no','like','%'.$request->text.'%')
                            ->orwhere('invoice_delivery','like','%'.$request->text.'%');
                    });
            });
        if($request->sortBy == 1){
            $order_payments= $order_payments->simplePaginate($count_paginate);
        }else{
            $order_payments= $order_payments->latest()->simplePaginate($count_paginate);
        }

        $payments=PaymentListResource::collection($order_payments);
        return responseApi(200, translate('return_data_success'), $payments);
    }

    public function show(Request $request){

        $user = auth()->user();
        if(!$user){
            return responseApi(403, "user not found");
        }

        $validator = validator($request->all(), [
            'payment_id' => 'required',
        ]);

        if ($validator->fails())
            return responseApi(405, $validator->errors()->first());

        $payment = Payment::with(['orders'])
            ->withSum('orders', 'profit_total')
            ->withCount('orders')
            ->where('id', $request->payment_id)
            ->first();

        if (!$payment) {
            return responseApi(403, translate("payment not found"));
        }
        if($request->has('text')){
            $text = str_replace('#', '', $request->text);
            $request->merge([
                'text'=>$text
            ]);
        }
        $orders = $payment->orders()
            ->when($request->has('to_at'), function ($q) use ($request) {
                $q->whereDate('created_at', '<=', $request->to_at);
            })
            ->when($request->has('text'), function ($q) use ($request) {
                $q->where('invoice_no', 'like', '%' . $request->text . '%')
                    ->orWhere('invoice_delivery', $request->text)
                    ->orWhereHas('customer', function ($cq) use ($request) {
                        $cq->where('phone_number', 'like', '%' . $request->text . '%')
                            ->orWhere('name', 'like', '%' . $request->text . '%');
                    });
            })
            ->get();

        $data['payment']=new PaymentListResource($payment);
        $data['order']= OrderListResource::collection($orders);
        return responseApi(200, translate('return_data_success'), $data);
    }

}
