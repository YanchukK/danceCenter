<?php

namespace App\Http\Controllers;

use App\Http\Requests\StyleRequest;
use App\Style;
use Illuminate\Http\Request;

class StyleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Style $style)
    {
        $styles = $style->all();
//        dd($branches->all());
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
        $style
            ->create($request->all())
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
        $style->update($request->all());

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
        $style->delete();

        return redirect()->route('style.index');
    }
}
