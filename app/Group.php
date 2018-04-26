<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['title', 'date_time', 'teacher_id', 'style_id', 'branch_id'];

    public function teacher  () {
       return $this->belongsTo(Teacher::class);
    }

    public function branch  () {
        return $this->belongsTo(Branch::class);
    }

    public function style  () {
        return $this->belongsTo(Style::class);
    }

    public function customers () {
        return $this->belongsToMany(Customer::class);
    }
}
