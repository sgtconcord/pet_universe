<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalFile extends Model
{
    use HasFactory;
    protected $table = 'animal_files';

    protected $fillable = [
        'animal_id',
        'type',
        'name',
        'description',
        'size',
        'file',
    ];
}
