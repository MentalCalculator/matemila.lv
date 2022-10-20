<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    // Parādīt galveno lapu / Show the main page

    public function index() {
        return view('index');
    }
}
