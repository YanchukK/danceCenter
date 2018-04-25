<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['login', 'password', 'name', 'l_name', 'email', 'p_number'];

    public function groups () {
        return $this->hasMany(Group::class);
    }
}
