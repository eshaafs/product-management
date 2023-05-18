<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SerialNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_number',
        'product_id',
        'prod_date',
        'waranty_start',
        'waranty_duration',
        'used',
        'price',
        'image'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
