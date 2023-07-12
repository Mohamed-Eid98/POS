<?php

namespace App\Models;

use App\Models\subCategory;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;


    protected $fillable = [
        'name',
        'code',
        'is_active',
        'description',
        'min_price',
        'sub_category_id',
        'max_price',
        'price',
        'is_new',
        'is_on_sale',
        'product_qty',

        'is_new_arrival',
        'is_best_seller'
    ];

    public static $rules = [
        'name' => 'required|max:100',
        'description' => 'required|string',
        'min_price' => 'required|numeric|min:0',
        'max_price' => 'required|numeric|min:0',
        'price' => 'required|numeric|min:0',
        'sub_category_id' => 'required|exists:sub_categories, id',
    ];


    public function scopeActive($query)
    {
        return $query->where('is_active',  1);
    }
    public function getPriceAfterDiscountAttribute()
    {

        if ($this->ProductOffer) {
            if ($this->ProductOffer->status && $this->ProductOffer->discount_value != 0) {
                return $this->price -   (($this->ProductOffer->discount_value / 100) * $this->price);
            }
        }
        return $this->price;
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }


    public function colors()
    {
        return $this->belongsToMany(Color::class)->withPivot('is_stock');
    }


    public function ProductOffer()
    {
        return $this->hasOne(ProductOffer::class, 'product_id');
    }

    public function  colorProducts()
    {
        return $this->hasMany(ColorProduct::class, 'product_id')->with('productColorSizes');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('thumb')
                    ->width(100)
                    ->height(100);
            });
    }



    public function is_favourite()
    {
        $data = false;
        if (auth()->id()) {
            $data =  DB::table('favourite_products')->where('user_id', auth()->id())->where('product_id', $this->id)->count() > 0;
        }

        return $data;
    }
}
