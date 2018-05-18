<?php

namespace App;

use App\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use Selectable;
    protected $fillable = ['desc', 'name', 'address', 'p_number', 'w_hours', 'branch_img'];

    public function groups  () {
        return $this->hasMany(Group::class);
    }
}
