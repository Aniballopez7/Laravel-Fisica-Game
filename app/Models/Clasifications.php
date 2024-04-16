<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clasifications extends Model
{
    protected $table = 'clasifications';

    public function user(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }
    use HasFactory;
}
