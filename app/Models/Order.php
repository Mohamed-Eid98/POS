<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];



    public function scopeFutureProfits($query)
    {
        return $query->wherein('status',  ['Pending', 'InProgress']);
    }

    public function scopeRealizedAndReceivedProfits($query)
    {
        return $query->wherein('status',  ['Delivered','Paid']);
    }
    public function scopeRealizedProfits($query)
    {
        return $query->wherein('status',  ['Delivered']);
    }

    public function scopeReceivedProfits($query)
    {
        return $query->wherein('status',  ['Paid']);
    }

    public function profits_status()
    {
        switch ($this->status){
            case'Paid':
                $status='Received';
                break;
            case'Delivered':
                $status='Realized';
                break;
            default:
                $status='Future';
                break;
        }

        return $status;

    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }


    public function order_items() {
        return $this->hasMany(OrderProduct::class);
    }
}
