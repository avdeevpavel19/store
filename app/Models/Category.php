<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
    ];

    public function properties(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CategoryProperty::class);
    }

    public function brands(): \Illuminate\Database\Eloquent\Relations\hasMany
    {
        return $this->hasMany(Brand::class);
    }
}
