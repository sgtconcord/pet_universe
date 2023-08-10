<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'animal',
        'payment_id',
        'card_number',
        'amount',
        'name',
        'email',
        'phone',
        'city',
        'post_code',
        'shipping_address',
        'status',
    ];

    function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    // function animal(){
    //     return $this->hasMany(Animal::class, 'id', 'animal');
    // }
}
