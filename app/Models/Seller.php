<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'store_name',
        'wallet_number'
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
}