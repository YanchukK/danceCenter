<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Customer;
use App\Group;
use App\News;
use App\Price;
use App\Style;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index (Group $group) {

        $news = News::all();
        $styles = Style::all();
        $branches = Branch::all();

        if(Auth::check()) {
            if(Auth::user()->middleware == '3c') {
                $email = Auth::user()->email;
                $customerId = Customer::where('email', $email)->first()->id;
                return view('main.index', compact('news', 'styles', 'branches', 'customerId'));
            }

            if(Auth::user()->middleware == '2t'){
                $email = Auth::user()->email;

                foreach ($group->all() as $groupItems) {
                    if( !empty($groupItems->teacher->id) ) {
                        $teacherId = $groupItems->teacher->where('email', $email)->first()->id;
                    }
                }
                return view('main.index', compact('news', 'styles', 'branches', 'teacherId'));
            }
        }


        return view('main.index', compact('news', 'styles', 'branches', 'customerId', 'teacherId'));
    }

    public function branches(Branch $branch) {

        $branches = $branch->all();
        return view('main.branches', compact('branches'));
    }

    public function styles(Style $style) {

        $styles = $style->all();
        return view('main.styles', compact('styles'));
    }

    public function prices(Price $price) {

        $prices = $price->all();
        return view('main.prices', compact('prices'));
    }

    public function teachers(Teacher $teacher) {

        $teachers = $teacher->all();
        return view('main.teachers', compact('teachers'));
    }

}
