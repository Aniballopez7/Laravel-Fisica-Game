<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_user extends Model
{
    protected $table = 'data_user';

    protected $fillable = [
        'name' => 'string',
        'last_name' => 'string',
        'puntuation' => 'integer',
        'photo_user' => 'string',
    ];
    
    use HasFactory;
}
