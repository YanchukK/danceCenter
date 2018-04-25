<?php

namespace App;

use App\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use Selectable;

    protected $fillable = ['login', 'password', 'name', 'l_name', 'email', 'p_number'];

    public function groups () {
        return $this->hasMany(Group::class);
    }
}
