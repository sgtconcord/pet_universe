<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WareHouse extends Model
{
    use HasFactory;

    protected $table = 'ware_houses';
    protected $fillable = [
        'warehouse_name',
        'warehouse_address',
        'warehouse_phone',
        'status',

    ];

    public static $statusArrays = ['active', 'inactive'];
}
