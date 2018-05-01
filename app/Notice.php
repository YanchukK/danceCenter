<?php

namespace App;

use App\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = ['body'];

    public function group() {
        return $this->hasMany(Group::class);
    }
}
