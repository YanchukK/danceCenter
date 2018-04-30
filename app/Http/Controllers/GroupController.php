<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Customer;
use App\Group;
use App\Http\Requests\GroupRequest;
use App\Style;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Group $group, Customer $customer)
    {
//        dd($group->all());
        if (Auth::user()->middleware == '2t') {

            foreach ($group->all() as $groupsTo) {
                $groupsWithTeacher = $groupsTo->teacher->where('email', Auth::user()->email)->get();
            }

            $groups = $group->where('teacher_id', $groupsWithTeacher->first()->id)->get();

            return view('group.index', compact('groups'));
        }

        if (Auth::user()->middleware == '3c') {
            $email = Auth::user()->email;

            foreach ($group->all() as $groupItems) { // SEARCH CURRENT CUSTOMER ID

                if ($groupItems->customers->where('email', $email)) {
                    $customerId = $groupItems->customers->where('email', $email)->first()->id; // todo maybe must be array
                    break;
                }
            }

            foreach ($group->all() as $groupItems) {
                $pivots[] = $groupItems->customers->first()->pivot;
            }
            //todo Найти пользователей с пивот айди
            //todo написать метод для вывода пользователей без форИч
            //todo Возможно создать колонку в юзерах з кастомер айди или тичер айди, скорее всего нужно создать, лучше создать отдельный метод

            foreach ($pivots as $pivot) {  // SEARCH GROUPS with CUSTOMERS ids
                if ($customerId == $pivot->customer_id) {
                    $groupsArray[] = $group->where('id', $pivot->group_id)->get();
                }
            }

            foreach ($groupsArray as $groups) { // collection in collection TO collection
//                dump($group->first());
                $groupsToCollect[] = $groups->first();
            }
            $groups = collect($groupsToCollect);

            return view('group.index', compact('groups'));
        }

        $groups = $group->all();
        dd($groups);
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
     * ==== foreach ($group->all() as $teachers) {    ====================
     * ====     dump($teachers->teacher);             ====================
     * ==== } - когда нужно обратиться к BelongsTo model  ================
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
