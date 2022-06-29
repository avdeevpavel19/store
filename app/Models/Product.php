<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
        'category_id',
        'brand_id',
        'color_id',
    ];

    public function properties() {
        return $this->belongsToMany(CategoryPropertyValue::class, 'product_category_property_values', 'product_id', 'property_value_id');
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
