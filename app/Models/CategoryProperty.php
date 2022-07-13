<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProperty extends Model
{
    use HasFactory;

    protected $table = 'category_properties';

    protected $fillable = [
        'category_id',
        'name'
    ];

    public function values()
    {
        return $this->hasMany(CategoryPropertyValue::class);
    }
}
