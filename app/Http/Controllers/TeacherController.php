<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\TeacherRequest;
use App\Teacher;
use App\Traits\ImageTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    use ImageTrait;

    public $path = 'teacher';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Teacher $teacher)
    {
        $teachers = $teacher->all();
//        dd($branches->all());
        return view('teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Teacher $teacher)
    {
//        dd($teacher->groups);
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request, Teacher $teacher)
    {
        $requestToUpload = $this->uploadImage($request, $this->path);

        $teacher
            ->create($requestToUpload)
            ->save();

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'middleware' => '2t'
        ]);

        return redirect()->route('teacher.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        $teachers = $teacher->findOrFail($teacher->id);

        return view('teacher.show', compact('teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $teachers = $teacher->findOrFail($teacher->id);

        return view('teacher.edit', compact('teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request, Teacher $teacher)
    {
        //        TODO реализовать удалиение проапдейченных изображений

        $requestToUpload = $this->uploadImage($request, $this->path);

        $teacher->update($requestToUpload);

        if(Auth::user()->middleware == '2t') {
            $id = $teacher->where('email', Auth::user()->email)->first()->id;

            return redirect()->route('teacher.show', ['id' => $id]);
        }

        return redirect()->route('teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $this->deleteImage($teacher->teacher_img, $this->path);

        $teacher->delete();

        return redirect()->route('teacher.index');
    }
}
