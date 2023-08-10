<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'childcategory_id',
        'brand_id',
        'pickuppoint_id',
        'warehouse_id',
        'name',
        'code',
        'unit',
        'tag_name',
        'color',
        'size',
        'video',
        'purchase_price',
        'selling_price',
        'discount_price',
        'stock_quantity',
        'warehuse',
        'description',
        'thumbnail',
        'image',
        'featured',
        'today_deal',
        'set_to_banner',
        'status',
        'flash_deal_id',
        'cash_on_delivery',
        'admin_id',
    ];


    public static $statusArrays = ['active', 'inactive'];
    public static $featuredArrays = ['yes', 'no'];
    public static $todayDealArrays = ['yes', 'no'];
    public static $setToBannerArrays = ['yes', 'no'];

    public function categorys()
    {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

    public function subcategory()
    {
        return $this->hasOne(SubCategory::class, 'id', 'subcategory_id');
    }

    public function childcategory()
    {
        return $this->hasOne(ChildCategory::class, 'id', 'childcategory_id');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    public function pickuppoint()
    {
        return $this->hasOne(PickupPoint::class, 'id', 'pickuppoint_id');
    }

    public function warehouse()
    {
        return $this->hasOne(WareHouse::class, 'id', 'warehouse_id');
    }


    public function tags()
{
    return $this->belongsToMany(UserHasTags::class);
}



}
