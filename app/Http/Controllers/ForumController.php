<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function seeCategories(){
        return view('forum.categories');
    }
}
