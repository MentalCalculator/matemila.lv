<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\TrainingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index']);

Route::get('/mentalmath/instruction', [TrainingController::class, 'instruction']);
Route::get('/mentalmath/discilpines', [TrainingController::class, 'showDiscilpines']);
