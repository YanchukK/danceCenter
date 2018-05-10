<?php

namespace App;

use App\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use Selectable;

    protected $fillable = ['cost_for_one'];

    public function groups() {
        return $this->hasMany(Group::class);
    }
}
