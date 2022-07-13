<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPropertyValue extends Model
{
    use HasFactory;

    protected $table = 'category_property_values';

    protected $fillable = [
        'category_property_id',
        'name'
    ];

    public function property()
    {
        return $this->belongsTo(CategoryProperty::class, 'category_property_id');
    }
}
