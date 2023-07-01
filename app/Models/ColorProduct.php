<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class ColorProduct extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $table = 'color_product';
    protected $guarded=[];
}

