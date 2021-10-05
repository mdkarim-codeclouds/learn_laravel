<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    public $timestamps = true;

    protected $casts = [
        'price' => 'float',
        'count' => 'int'
    ];

    protected $fillable = [
        'thumbnail_image',
        'large_image',
        'name',
        'description',
        'price',
        'count',
        'discount_price',
        'discount_start_date',
        'discount_end_date',
        'created_at'
    ];
}