<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $fillable = [
        'brand_name',
        'brand_slug',
        'brand_logo',
        'front_page',
        'status',
    ];

    public static $statusArrays = ['active', 'inactive'];
    public static $frontPageArrays = ['yes', 'no'];
}
