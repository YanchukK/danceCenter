<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Customer;
use App\Group;
use App\Http\Requests\GroupRequest;
use App\Style;
use App\Teacher;
use App\Traits\GroupsForOneCustomer;
use App\Traits\ImageTrait;
use App\Traits\TeacherOwned;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    use GroupsForOneCustomer, ImageTrait, TeacherOwned;

    public $path = 'group';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Group $group)
    {
        if ( Auth::user()->middleware == '2t' ) {

            $teacherId = Auth::user()->native_teacher_id;
            $teacherOwnedGroups = $this->teacherOwnedGroups($group, $teacherId);

            if ( $teacherOwnedGroups->count() < 1 ) {
                return view('master', compact('teacherId')); // with error -> you haven't any groups
            }
            $groups = $teacherOwnedGroups->get();

            return view('group.index', compact('groups'));

        }

        if (Auth::user()->middleware == '3c') {

            $currentCustomerGroups = Customer::where('id', Auth::user()->native_customer_id)->first()->groups;
            $groups = $currentCustomerGroups;

            return view('group.index', compact('groups'));
        }

        $groups = $group->all();

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
        $requestToUpload = array_except($this->uploadImage($request, $this->path), ['customer_id']);

        $group
            ->create($requestToUpload)
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

        if ( Auth::user()->middleware == '2t' ) {

            $currentTeacherGroups = $group->where('teacher_id', Auth::user()->native_teacher_id)->get();
            $groups = $currentTeacherGroups->find($group->id);

            if (empty($groups)) {
                return $this->index($group);
            }
            return view('group.show', compact('groups'));
        }

        if ( Auth::user()->middleware == '3c' ) {

            $currentCustomerGroups = Customer::where('id', Auth::user()->native_customer_id)->first()->groups;
            $groups = $currentCustomerGroups->find($group->id);

            if (empty($groups)) {
                return $this->index($group); // with errors
            }
            return view('group.show', compact('groups'));
        }

        $groups = $group->findOrFail($group->id);

        return view('group.index', compact('groups'));
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
        /**
         * Так после Update записи, старое изображение не сохраняется, мы его удаляем из Storage
         */
        $this->deleteImage($group->findOrFail($group->id)->group_img, $this->path);

        $groups = $group->findOrFail($group->id);
        $teachers_list = $teacher->getSelectList();
        $branches_list = $branch->getSelectList();
        $styles_list = $style->getSelectList('title');
        $customers_list = $customer->getSelectList();

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
        $requestToUpload = array_except($this->uploadImage($request, $this->path), ['customer_id']);

        $group->update($requestToUpload);
        $group->customers()->sync($request->customer_id);

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
        $this->deleteImage($group->group_img, $this->path);
        $group->delete();

        return redirect()->route('group.index');
    }
}
