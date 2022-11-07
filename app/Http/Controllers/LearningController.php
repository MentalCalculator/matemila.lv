<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LearningController extends Controller
{
    public function seeTopics(){
        return view('learning.topics');
    }
}
