<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number',
        'second_phone_number',
        'name',
        'address',
        'is_active',
        'city_id',
        'area_id',
        'user_id'
    ];
    public function scopeActive($query)
    {
        return $query->where('is_active',  1);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
