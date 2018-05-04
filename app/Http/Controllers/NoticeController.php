<?php

namespace App\Http\Controllers;

use App\Group;
use App\Notice;
use App\Teacher;
use App\Traits\Selectable;
use App\Traits\TeacherOwned;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
{
    use TeacherOwned, Selectable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // может сделать все в конструкторе
    public function index(Notice $notice)
    {
        // Показать все записи

        $notices = $notice->all();

        return view('notice.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Group $group, Notice $notice)
    {
        foreach ($notice->all() as $notices) {
            $groupToShow = $notices->group->first();
            // В селект лист только так группа, к которой прикреплен учитель
            if ( $groupToShow->teacher_id !== Auth::user()->native_teacher_id ) {
                return $this->index($notice); // with errors
            }
            $groups_list = $groupToShow->getSelectList('title'); //maybe must be array
        }

        return view('notice.create', compact('groups_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Notice $notice)
    {
        $notice
            ->create($request->except('group_id'))
            ->group()
            ->save(Group::find($request->group_id));

        return redirect()->route('notice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notice $notice
     * @return \Illuminate\Http\Response
     */
//    public function show(Notice $notice)
//    {
//        //TODO Create column created by
//        $notice_id = Group::where('teacher_id', Auth::user()->native_teacher_id)->get();
//        dd($notice_id);
//        $notices = $notice->findOrFail($notice->id);
//
//        return view('notice.show', compact('notices'));
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notice $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice, Group $group)
    {
        $groupBelongsToNoticeAndCurrentTeacher = Group::where('teacher_id', Auth::user()->native_teacher_id)->first();

        if ( !isset($groupBelongsToNoticeAndCurrentTeacher) ) {
            return $this->index($notice); // with errors
        }

        if ( $groupBelongsToNoticeAndCurrentTeacher->id !== $notice->id ) {
            return $this->index($notice); // with errors
        }

        $notices = $notice->findOrFail($notice->id);
        //Сначала делаем array_wrap - конвертирует строку в елемент массива с числовым ключем, потом добавляем в коллекцию
        // TODO Use array_pluck
        dd(array_wrap($groupBelongsToNoticeAndCurrentTeacher));
        $groups_list = collect(array_wrap($groupBelongsToNoticeAndCurrentTeacher))->getList();

        return view('notice.edit', compact('notices', 'groups_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Notice $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
        // на всякий случай =)
        $groupBelongsToNoticeAndCurrentTeacher = Group::where('teacher_id', Auth::user()->native_teacher_id)->first();

        if ( !isset($groupBelongsToNoticeAndCurrentTeacher) ) {
            return $this->index($notice); // with errors
        }

        if ( $groupBelongsToNoticeAndCurrentTeacher->id !== $notice->id ) {
            return $this->index($notice); // with errors
        }

        Group::where('id', $request->group_id)
            ->update(['notice_id' => $notice->id]);
        $notice
            ->update($request->except('group_id'));

        return redirect()->route('notice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notice $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        // на всякий случай =)
        $groupBelongsToNoticeAndCurrentTeacher = Group::where('teacher_id', Auth::user()->native_teacher_id)->first();

        if ( !isset($groupBelongsToNoticeAndCurrentTeacher) ) {
            return $this->index($notice); // with errors
        }

        if ( $groupBelongsToNoticeAndCurrentTeacher->id !== $notice->id ) {
            return $this->index($notice); // with errors
        }

        Group::where('notice_id', $notice->id)
            ->update(['notice_id' => NULL]);

        $notice->delete();

        return redirect()->route('notice.index');
    }
}
