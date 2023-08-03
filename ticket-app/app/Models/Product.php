<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Brand;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'name',
        'price',
        'description',
        'category_id',

    ];

    public function brand(): HasOne
    {
        return $this->hasOne(Brand::class);
    }

    public function category(): HasOne
    {
        return $this->hasOne(Category::class);
    }
}
