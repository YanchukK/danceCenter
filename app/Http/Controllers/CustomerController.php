<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CustomerRequest;
use App\Traits\ImageTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    use ImageTrait;

    public $path = 'customer';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $customer)
    {
        $customers = $customer->all();
//        dd($branches->all());
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request, Customer $customer)
    {
        $requestToUpload = $this->uploadImage($request, $this->path);
//        dd($requestToUpload);
        User::create([
            'name' => $requestToUpload['name'],
            'email' => $requestToUpload['email'],
            'password' => Hash::make($requestToUpload['password']),
            'middleware' => '3c'
        ]);
        $customer
            ->create($requestToUpload)
            ->save();
        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $customers = $customer->findOrFail($customer->id);
//        dd($customer->findOrFail($customer->id));
        return view('customer.show', compact('customers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $customers = $customer->findOrFail($customer->id);

        return view('customer.edit', compact('customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $requestToUpload = $this->uploadImage($request, $this->path);
        $customer->update($requestToUpload);

        if(Auth::user()->middleware == '3c') {
            $id = $customer->where('email', Auth::user()->email)->first()->id;

            return redirect()->route('customer.show', ['id' => $id]);
        }

        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customer.index');
    }
}
