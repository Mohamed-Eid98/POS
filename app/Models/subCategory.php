<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class SubCategory extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded =[];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * Get all of the comments for the subCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'sub_category_id', 'id');
    }
}
