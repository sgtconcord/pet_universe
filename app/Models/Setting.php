<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table='settings';
    protected $fillable =[
        'user_id',
        'key',
        'value'
    ];

    public static $keyArray =['logo','contact_no_1','contact_no_2', 'email', 'facebook', 'twitter', 'linkedin','instagram','office_address',];
    
}
