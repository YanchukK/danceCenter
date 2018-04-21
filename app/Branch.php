<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = ['title', 'name', 'address', 'p_number', 'w_hours'];
}
