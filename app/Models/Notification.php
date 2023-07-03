<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notification extends Model
{
    use HasFactory ;
    protected $guarded=[];



    public function scopeNotf($q){
        return $q->wherein('type',['Product', 'Category','SubCategory','Info']);
    }
    public function scopeNotice($q){
        return $q->wherein('type',['Notice']);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_notifications');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'type_id');
    }
    public function users_pov()
    {
        return $this->hasMany(UserNotification::class);
    }
    public function isShow()
    {

        if(auth()->id()){
           $is_show=$this->users_pov()->where('user_id',auth()->id())
               ->where('is_show',0)->first();
            if($is_show){
                return false;
            }
        }
        return true;
    }
}
