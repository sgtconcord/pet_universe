<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginSlider extends Model
{
    use HasFactory;

    protected $table = 'login_sliders';
    protected $fillable =[
        'image',
        'status'
    ];

    public static $statusArray = ['active','inactive'];
}
