<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\MentalMathNewsController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\ForumController;
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

Route::get('/mentalmath/news', [MentalMathNewsController::class, 'seeNews']);
Route::get('/mentalmath/instruction', [TrainingController::class, 'instruction']);
Route::get('/mentalmath/results', [TrainingController::class, 'showResults']);
Route::get('/mentalmath/discilpines', [TrainingController::class, 'showDiscilpines']);

Route::get('/learning', [LearningController::class, 'seeTopics']);

Route::get('/forum', [ForumController::class, 'seeCategories']);
