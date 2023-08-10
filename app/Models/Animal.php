<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $table = 'animals';
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'pickup_point_id',
        'name',
        'slug',
        'description',
        'purchase_price',
        'selling_price',
        'discount_price',
        'stock_quantity',
        'qty',
        'image',
        'status',

    ];

    public static $statusArrays = ['active', 'inactive'];
    public static $featuredArrays = ['yes', 'no'];
    public static $todayDealArrays = ['yes', 'no'];


    public function category()
    {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

    public function subcategory()
    {
        return $this->hasOne(SubCategory::class, 'id', 'subcategory_id');
    }

    public function pickuppoint()
    {
        return $this->hasOne(PickupPoint::class, 'id', 'pickup_point_id');
    }
}
