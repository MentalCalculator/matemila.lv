<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function instruction(){
        return view('training.instruction');
    }

    public function showDiscilpines(){
        return view('training.discilpines');
    }

    public function showResults(){
        return view('training.results');
    }
    
}
