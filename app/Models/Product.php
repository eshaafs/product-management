<?php

namespace App\Models;

use App\Models\SerialNumber;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'price',
        'model_number',
        'image'
    ];

    public function serial_numbers(): HasMany
    {
        return $this->hasMany(SerialNumber::class);
    }
    
    public function transactions(): HasMany
    {
        return $this->hasMany(SerialNumber::class);
    }
}
