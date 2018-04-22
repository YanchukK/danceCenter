<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['title', 'date_time', 'teacher_id', 'style_id', 'branch_id'];
}
