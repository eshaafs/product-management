<?php

namespace App\Models;

use App\Models\Transaction;
use App\Models\SerialNumber;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'brand',
        'price',
        'model_number',
        'image'
    ];

    public function serial_numbers() : HasMany
    {
        return $this->hasMany(SerialNumber::class);
    }
    
    public function transactions() : HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function getRouteKeyName(): string
    {
        return 'model_number';
    }
}
