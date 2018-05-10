<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\News;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use ImageTrait;
    public $path = 'news';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(News $news)
    {
        $newses = $news->all();

        return view('news.index', compact('newses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request, News $news)
    {
        $requestToUpload = $this->uploadImage($request, $this->path);
        $news
            ->create($requestToUpload)
            ->save();
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $this->deleteImage($news->findOrFail($news->id)->news_img, $this->path);
        $newses = $news->findOrFail($news->id);

        return view('news.edit', compact('newses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $requestToUpload = $this->uploadImage($request, $this->path);

        $news->update($requestToUpload);

        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $this->deleteImage($news->news_img, $this->path);

        $news->delete();

        return redirect()->route('news.index');
    }
}
