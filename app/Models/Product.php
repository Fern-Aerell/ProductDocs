<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'route',
        'name'
    ];

    public function features(): HasMany
    {
        return $this->hasMany(Feature::class);
    }
}
