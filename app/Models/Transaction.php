<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_date',
        'transaction_number',
        'customer_or_vendor',
        'transaction_type'
    ];
    
    public function transaction_detail() : HasOne
    {
        return $this->hasOne(DetailTransaction::class);
    }

    public function getRouteKeyName(): string
    {
        return 'transaction_number';
    }
}
