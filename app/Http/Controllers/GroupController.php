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
//        dd($branches->all());
        return view('group.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Teacher $teacher, Branch $branch, Style $style, Customer $customer)
    {
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
    public function store(GroupRequest $request, Group $group, Customer $customer)
    {
        $group
            ->create($request->all())
            ->customers()
            ->sync([1,3]);
//            ->save();
//        dd($request->input('customer_id')[0]);


//        dd( $customer->groups()->getRelatedIds() );

//            $request->input('customer_id')[0],
//            $group->all()->last()->id
//        $r = [1,2];
////        $customer->groups()->sync([1,2], false);
//        $group->customers()->attach([1,2]);
//        $customer->groups()->attach([1,2]);
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
     */
    public function edit(Group $group)
    {
        $groups = $group->findOrFail($group->id);

        return view('group.edit', compact('groups'));
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
