<?php

namespace App;

use App\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    use Selectable;
    protected $fillable = ['title', 'desc', 'style_img'];

    public function groups  () {
        return $this->hasMany(Group::class);
    }
}
