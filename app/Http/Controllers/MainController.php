<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function branches(Branch $branch) {

        $branches = $branch->all();
        return view('main.branches', compact('branches'));
    }
}
