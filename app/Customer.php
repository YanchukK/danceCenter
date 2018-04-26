<?php

namespace App;

use App\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use Selectable;

    protected $fillable = ['name', 'l_name', 'email', 'login', 'password', 'p_number'];

    public function groups () {
        return $this->belongsToMany(Group::class);
    }
}
