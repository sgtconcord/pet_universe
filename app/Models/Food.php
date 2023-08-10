<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = [
        'category_id',
        'sub_category_id',
        'pickup_point_id',
        'name',
        'img',
        'purchase_price',
        'selling_price',
        'discount_price',
        'quantity',
        'description',
        'status',
    ];

    public static $statusArray = ['active', 'inactive'];
}
