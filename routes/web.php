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

Route::get('/', [MainController::class, 'index'])->name('mainPage');

Route::get('/mentalmath/news', [MentalMathNewsController::class, 'seeNews'])->name('mentalMathNews');
Route::get('/mentalmath/instruction', [TrainingController::class, 'instruction'])->name('mentalMathInstruction');
Route::get('/mentalmath/results', [TrainingController::class, 'showResults'])->name('mentalMathResults');
Route::get('/mentalmath/discilpines', [TrainingController::class, 'showDiscilpines'])->name('mentalMathDiscilpines');

Route::get('/learning', [LearningController::class, 'seeTopics'])->name('eSchool');

Route::get('/forum', [ForumController::class, 'seeCategories'])->name('forum');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
