<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SerialNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_number',
        'prod_date',
        'waranty_start',
        'waranty_duration',
        'used',
        'price',
        'image'
    ];
}
