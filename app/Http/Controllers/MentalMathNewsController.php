<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MentalMathNewsController extends Controller
{
    public function seeNews(){
        return view('training.news');
    }
}
