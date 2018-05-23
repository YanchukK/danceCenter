<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Group;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function learner(Group $group) {
        $email = Auth::user()->email;
        $customerId = Customer::where('email', $email)->first()->id;

        return view('learner', compact('customerId'));
    }

    public function master(Group $group) {
        $email = Auth::user()->email;

        foreach ($group->all() as $groupItems) {
            if( !empty($groupItems->teacher->id) ) {
                $teacherId = $groupItems->teacher->where('email', $email)->first()->id;
            }
        }

        return view('master', compact('teacherId'));
    }
}
