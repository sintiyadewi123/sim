<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AkunGuru extends Model
{
    protected $table = 'users';
     protected $fillable=['username','email','password'];
}
