<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Http\Requests\BranchRequest;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class BranchController extends Controller
{
    use ImageTrait;

    public $path = 'branch';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function __counstruct() {
//        if(!Auth::check()) {
//            return view('main.index');
//        }
//    }

    public function index(Branch $branch)
    {
        $branches = $branch->all();
        return view('branch.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('branch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchRequest $request, Branch $branch)
    {
        $requestToUpload = $this->uploadImage($request, $this->path);

        $branch
            ->create($requestToUpload)
            ->save();

        return redirect()->route('branch.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        $branches = $branch->findOrFail($branch->id);

        return view('branch.show', compact('branches'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        /**
         * Так после Update записи, старое изображение не сохраняется, мы его удаляем из Storage
        */
        $this->deleteImage($branch->findOrFail($branch->id)->branch_img, $this->path);

        $branches = $branch->findOrFail($branch->id);
        return view('branch.edit', compact('branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(BranchRequest $request, Branch $branch)
    {
        $requestToUpload = $this->uploadImage($request, $this->path);

        $branch->update($requestToUpload);

        return redirect()->route('branch.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $this->deleteImage($branch->branch_img, $this->path);

        $branch->delete();

        return redirect()->route('branch.index');
    }
}
