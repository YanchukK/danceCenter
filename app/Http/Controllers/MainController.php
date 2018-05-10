<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Price;
use App\Style;
use App\Teacher;
use Illuminate\Http\Request;

class MainController extends Controller
{
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
    /**
     *SECTIONS TO SHOW
     */
//    public function showIndex() {
//        return view('main.teachers');
//    }


//    public function newsSlider() {
//        //
//    }

//    public function commercialSlider() {
//        //
//    }
//
//    public function showStyles() {
//        //
//    }
//
//    public function showBranches() {
//        //
//    }
//
//    public function showFeedback() {
//        //
//    }



}
