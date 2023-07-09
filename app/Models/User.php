<?php

namespace App\Models;

use App\Models\Order;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject, HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'activation_code',
        'address',
        'lat',
        'lang',
        'is_active',
        'is_registerd',
        'city_id',
        'area_id',
        'country_id',
        'gender',
        'date_of_birth',
        'device_token' // attriiteattribute added
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function seller()
    {
        return $this->hasOne(Seller::class);
    }
    public function getPackage()
    {
        $count_order =  Order::where('user_id', $this->id)->count();
        $package = Package::where('count_order', '<=', $count_order)
            ->orderBy('count_order', 'DESC')->first();
        return $package;
    }
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function notifications()
    {
        return $this->belongsToMany(Notification::class, 'user_notifications');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
