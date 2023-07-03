<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use function App\Helpers\translate;

class CustomerController extends Controller
{
    public $customerModel;
    public function __construct(Customer $customer){
        $this->customerModel = $customer;
        $this->middleware('auth.guard:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_customer(Request $request)
    {

        if(! auth()->id()){
            return responseApi(403, translate('token could not be parsed from the request'));

        }
        $validator = validator($request->all(), [
            "name" => "required|string",
            "phone_number" => "required|string",
            "second_phone_number" => "string",
            "address" => "required|string",
            "area_id" => "required|exists:areas,id",
            "city_id" => "required|exists:cities,id"
        ]);

        if ($validator->fails())
            return responseApi(403, $validator->errors()->first());

       $customer= $this->customerModel->create([
            'phone_number' => $request->phone_number,
            'second_phone_number' => $request->second_phone_number,
            'name' => $request->name,
            'address' => $request->address,
            'area_id' => $request->area_id,
            'city_id' => $request->city_id,
            'user_id' =>  auth()->id()
        ]);

        return responseApi(200, translate('customer added'),$customer);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_all_customers_per_user(Request $request)
    {
        if(! auth()->id()){
            return responseApi(403, translate('token could not be parsed from the request'));

        }

        $text=$request->text;
        $customers = Customer::with('user')->Active()
            ->when($request->has('text'),function ($q) use($text){
                $q->where(function ($q2) use($text){
                    $q2-> where("phone_number", "LIKE", "%$$text%")
                        ->orwhere("second_phone_number", "LIKE", "%$text%")
                        ->orwhere("name", "LIKE", "%$text%");
                });
            })->where('user_id', auth()->id())
            ->latest()
            ->simplePaginate(10);

        $customers_response = CustomerResource::collection($customers);
        return responseApi(200, translate('return_data_success'), $customers_response);
    }

    public function search_customer(Request $request){

        if(! auth()->id()){
            return responseApi(403, translate('token could not be parsed from the request'));

        }
        $validator = validator($request->all(), [
            "text" => "required",
        ]);

        if ($validator->fails())
            return responseApi(403, $validator->errors()->first());

        $text=$request->text;
        $customers = Customer::where('user_id', auth()->id())->Active()->where(function ($q) use($text){
            $q-> where("phone_number", "LIKE", "%$$text%")
                ->orwhere("second_phone_number", "LIKE", "%$text%")
                ->orwhere("name", "LIKE", "%$text%");
        })->simplePaginate(10);
        $customers_response = CustomerResource::collection($customers);
        return responseApi(200,'customers found', $customers_response);

    }


    public function get_customer($customer_id)
    {

        if(! auth()->id()){
            return responseApi(403, translate('token could not be parsed from the request'));

        }

        $customer= $this->customerModel::whereId($customer_id)->where('user_id',auth()->id())->first();
        if(!$customer){
            return responseApi(403, translate('customer not found'));
        }
        return responseApi(200, translate('return_data_success'), new CustomerResource($customer));

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_customer(Request $request)
    {

        if(! auth()->id()){
            return responseApi(403, translate('token could not be parsed from the request'));

        }
        $validator = validator($request->all(), [
            "customer_id" => "required",
            "name" => "required|string",
            "phone_number" => "required|string",
            "second_phone_number" => "string",
            "address" => "required|string",
            "area_id" => "required|exists:areas,id",
            "city_id" => "required|exists:cities,id"
        ]);

        if ($validator->fails())
            return responseApi(403, $validator->errors()->first());

        $customer= $this->customerModel::whereId($request->customer_id)->where('user_id',auth()->id())->first();
        if(!$customer){
            return responseApi(403, translate('customer not found'));
        }
        $customer->update([
            'phone_number' => $request->phone_number,
            'second_phone_number' => $request->second_phone_number,
            'name' => $request->name,
            'address' => $request->address,
            'area_id' => $request->area_id,
            'city_id' => $request->city_id
        ]);

        return responseApi(200, translate('customer updated'), new CustomerResource($customer));

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete_customer(Request $request)
    {

        if(! auth()->id()){
            return responseApi(403, translate('token could not be parsed from the request'));

        }
        $validator = validator($request->all(), [
            "customer_id" => "required"
        ]);

        if ($validator->fails())
            return responseApi(403, $validator->errors()->first());

        $customer= $this->customerModel::whereId($request->customer_id)
            ->where('user_id',auth()->id())->first();
        if(!$customer){
            return responseApi(403, translate('customer not found'));
        }

        $orders_count=$customer->orders->count();
        if($orders_count <= 0){
            $customer->delete();
        }

        $customer->is_active=0;
        $customer->save();

        return responseApi(200, translate('customer deleted'));

    }
}
