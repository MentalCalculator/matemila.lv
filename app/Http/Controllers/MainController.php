<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class MainController extends Controller
{
    // Parādīt galveno lapu / Show the main page

    public function index() {
        return view('index');
    }

}
