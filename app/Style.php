<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $fillable = ['title'];

    public function groups  () {
        return $this->hasMany(Group::class);
    }
}
