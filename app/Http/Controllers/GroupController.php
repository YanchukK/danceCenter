<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Customer;
use App\Group;
use App\Http\Requests\GroupRequest;
use App\Style;
use App\Teacher;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Group $group)
    {
        $groups = $group->all();

//        dd($group->get()[0]->teacher);
//        $teachers = Teacher::has('groups')->get();
        return view('group.index', compact('groups')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Teacher $teacher, Branch $branch, Style $style, Customer $customer)
    {
//        TODO Переделать! что бы вся информация бралась с группы

        $teachers_list = $teacher->getSelectList();
        $branches_list = $branch->getSelectList();
        $styles_list = $style->getSelectList('title');
        $customers_list = $customer->getSelectList();

        return view('group.create',
            compact(
                'teachers_list',
                'branches_list',
                'styles_list',
                'customers_list'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request, Group $group)
    {

        $group
            ->create($request->except('customer_id'))
            ->customers()
            ->sync($request->customer_id);

        return redirect()->route('group.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $groups = $group->findOrFail($group->id);

        return view('group.show', compact('groups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group $group
     * @return \Illuminate\Http\Response
     * ===================================================================
     * ===================================================================
     * ==== $branch->all() - когда вызывается модель  ====================
     * ==== $group->branch->get() - когда вызывается связанная модель ====
     * ===================================================================
     * ===================================================================
     */
    public function edit(Group $group, Branch $branch, Teacher $teacher, Customer $customer, Style $style)
    {
        $groups = $group->findOrFail($group->id);
        $teachers_list = $teacher->getSelectList();
        $branches_list = $branch->getSelectList();
        $styles_list = $style->getSelectList('title');
        $customers_list = $customer->getSelectList();
//        dd($groups);
        return view('group.edit', compact(
            'teachers_list',
            'branches_list',
            'styles_list',
            'customers_list',
            'groups'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Group $group
     * @return \Illuminate\Http\Response
     */
    public function update(GroupRequest $request, Group $group)
    {
        $group->update($request->all());

        return redirect()->route('group.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('group.index');
    }
}
