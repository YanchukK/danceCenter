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

        $r_customers = [];
        $n_customers = [];

        foreach ($customers as $c_one) {

            if(substr($c_one->name, -6) == 'newbie') {
                $n_customers[] = $c_one;
            }
            else {
                $r_customers[] = $c_one;
            }
        }

        $new_customers = collect($n_customers);
        $regular_customers = collect($r_customers);

        return view('customer.index', compact('regular_customers', 'new_customers'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request, Customer $customer)
    {
//        dd('store');
        $requestToUpload = $this->uploadImage($request, $this->path);

        if ( Auth::guest() ) {

            $name = $requestToUpload['name'] . '_newbie';
            $requestToUpload['name'] = $name;

            $customer
                ->create($requestToUpload)
                ->save();
            return redirect('/');
        }

        $customer
            ->create($requestToUpload)
            ->save();

        $nativeCustomersId = $customer->get()->last()->id;


        User::create([
            'name' => $requestToUpload['name'],
            'email' => $requestToUpload['email'],
            'password' => Hash::make($requestToUpload['password']),
            'middleware' => '3c',
            'native_customer_id' => $nativeCustomersId
        ]);

        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {

        $customers = $customer->findOrFail($customer->id);
        return view('customer.show', compact('customers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        /**
         * Так после Update записи, старое изображение не сохраняется, мы его удаляем из Storage
         */
        $this->deleteImage($customer->findOrFail($customer->id)->customer_img, $this->path);
        $customers = $customer->findOrFail($customer->id);

        return view('customer.edit', compact('customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $requestToUpload = $this->uploadImage($request, $this->path);
        $customer->update($requestToUpload);

        if ( Auth::user()->middleware == '3c' ) {
            $id = $customer->where('email', Auth::user()->email)->first()->id;

            return redirect()->route('customer.show', ['id' => $id]);
        }

        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $this->deleteImage($customer->branch_img, $this->path);
        $customer->delete();

        return redirect()->route('customer.index');
    }
}
