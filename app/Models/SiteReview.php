<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteReview extends Model
{
    use HasFactory;

    protected $table = 'site_reviews';
    protected $fillable = [
        'user_id',
        'name',
        'designation',
        'comment',
        'image',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

   
}
