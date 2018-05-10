<?php

namespace App;

use App\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use Selectable;
    protected $fillable = ['title', 'date_time', 'teacher_id', 'style_id', 'branch_id', 'notice_id', 'group_img', 'price_id'];

    public function teacher  () {
       return $this->belongsTo(Teacher::class);
    }

    public function branch  () {
        return $this->belongsTo(Branch::class);
    }

    public function style  () {
        return $this->belongsTo(Style::class);
    }

    public function notice  () {
        return $this->belongsTo(Notice::class);
    }

    public function customers () {
        return $this->belongsToMany(Customer::class);
    }

    public function price () {
        return $this->belongsTo(Price::class);
    }
}
