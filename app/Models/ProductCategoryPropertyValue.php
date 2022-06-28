<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryPropertyValue extends Model
{
    use HasFactory;

    protected $table = 'product_category_property_values';

    protected $fillable = [
        'product_id',
        'property_value_id',
    ];
}
