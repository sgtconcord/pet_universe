<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'category_name',
        'category_slug',
        'status',

    ];

    public static $statusArrays = ['active', 'inactive'];

    public function subcategory()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }
}
