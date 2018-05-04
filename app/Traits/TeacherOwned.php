<?php
/**
 * Created by PhpStorm.
 * User: марк
 * Date: 04.05.2018
 * Time: 6:20
 */

namespace App\Traits;


use App\Teacher;
use Illuminate\Support\Facades\Auth;

trait TeacherOwned
{

    public function teacherOwnedGroups($group, $currentTeacherId)
    {
        $groups = $group->where('teacher_id', $currentTeacherId);
        return $groups;
    }

    public function teacherOwnedNotices($notice)
    {
        $email = Auth::user()->email;
        $teacherId = Teacher::where('email', $email)->first()->id;

        foreach ($notice->first()->group as $groups) {
            if($groups->teacher_id == $teacherId) {
               return $notice->all();
            }
        }
    }
}