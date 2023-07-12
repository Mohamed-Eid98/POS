<?php

namespace App\Models;

use App\Models\Product;
use App\Models\subCategory;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model  implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['name'];


    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->hasMany(subCategory::class, 'sub_category_id');
    }
}
