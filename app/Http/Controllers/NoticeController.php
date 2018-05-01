<?php

namespace App\Http\Controllers;

use App\Group;
use App\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Notice $notice)
    {
        $notices = $notice->all();

        return view('notice.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Group $group)
    {
        $groups_list = $group->getSelectList('title');

        return view('notice.create', compact('groups_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        $notices = $notice->findOrFail($notice->id);

        return view('notice.show', compact('notices'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice, Group $group)
    {
        $notices = $notice->findOrFail($notice->id);
        $groups_list = $group->getSelectList('title');

        return view('notice.edit', compact('notices','groups_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
        Group::where('id', $request->group_id)
            ->update(['notice_id' => $notice->id]);
        $notice
            ->update($request->except('group_id'));

        return redirect()->route('notice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        Group::where('notice_id', $notice->id)
            ->update(['notice_id' => NULL]);

        $notice->delete();

        return redirect()->route('notice.index');
    }
}
