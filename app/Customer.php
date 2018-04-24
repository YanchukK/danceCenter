<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'l_name', 'email', 'login', 'password', 'p_number'];
}
