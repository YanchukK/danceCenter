<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceRequest;
use App\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Price $price)
    {
        $prices = $price->all();
        return view('price.index', compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('price.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PriceRequest $request, Price $price)
    {
        $price
            ->create($request->all())
            ->save();

        return redirect()->route('price.index');
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  \App\Price  $price
//     * @return \Illuminate\Http\Response
//     */
//    public function show(Price $price)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        $prices = $price->findOrFail($price->id);
        return view('price.edit', compact('prices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(PriceRequest $request, Price $price)
    {
        $price->update($request->all());

        return redirect()->route('price.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        $price->delete();

        return redirect()->route('price.index');
    }
}
