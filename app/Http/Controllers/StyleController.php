<?php

namespace App\Http\Controllers;

use App\Http\Requests\StyleRequest;
use App\Style;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class StyleController extends Controller
{
    use ImageTrait;
    public $path = 'style';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Style $style)
    {
        $styles = $style->all();

        return view('style.index', compact('styles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('style.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StyleRequest $request, Style $style)
    {
        $requestToUpload = $this->uploadImage($request, $this->path);
        $style
            ->create($requestToUpload)
            ->save();
        return redirect()->route('style.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function show(Style $style)
    {
        $styles = $style->findOrFail($style->id);

        return view('style.show', compact('styles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function edit(Style $style)
    {
        $this->deleteImage($style->findOrFail($style->id)->style_img, $this->path);
        $styles = $style->findOrFail($style->id);

        return view('style.edit', compact('styles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Style $style)
    {
        $requestToUpload = $this->uploadImage($request, $this->path);

        $style->update($requestToUpload);

        return redirect()->route('style.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function destroy(Style $style)
    {
        $this->deleteImage($style->style_img, $this->path);

        $style->delete();

        return redirect()->route('style.index');
    }
}
