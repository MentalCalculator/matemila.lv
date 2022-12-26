<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\MentalMathNewsController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\Auth\ProfileController;
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
Route::get('/mentalmath/disciplines/id={discipline}&mode={mode}', [TrainingController::class, 'doDiscipline'])->name('doDiscipline');
Route::post('/mentalmath/disciplines/id={discipline}&mode={mode}/update', [TrainingController::class, 'saveTrainingResult'])->name('saveTrainingResult');
Route::get('/mentalmath/disciplines/result', [TrainingController::class, 'viewTrainingResult'])->name('viewTrainingResult');

Route::get('/learning', [LearningController::class, 'seeTopics'])->name('eSchool');

Route::get('/forum', [ForumController::class, 'seeCategories'])->name('forum');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile', [ProfileController::class, 'viewProfile'])->name('viewProfile');
    Route::get('/edit_profile', [ProfileController::class, 'editProfile'])->name('editProfile');
    Route::post('/update_profile', [ProfileController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/edit_password', [ProfileController::class, 'editPassword'])->name('editPassword');
    Route::post('/update_password', [ProfileController::class, 'updatePassword'])->name('updatePassword');
    Route::delete('/delete_profile', [ProfileController::class, 'deleteProfile'])->name('deleteProfile');

    Route::group(['middleware' => 'admin'], function(){
        Route::get('/all_profiles', [ProfileController::class, 'viewAllProfiles'])->name('viewAllProfiles');
        Route::get('/all_profiles/edit/{id}', [ProfileController::class, 'editAnotherProfile'])->name('editAnotherProfile');
        Route::get('/all_profiles/search', [ProfileController::class, 'searchProfiles'])->name('searchProfiles');
        Route::post('/all_profiles/update/{id}', [ProfileController::class, 'updateAnotherProfile'])->name('updateAnotherProfile');
        Route::delete('/all_profiles/delete/{id}', [ProfileController::class, 'deleteAnotherProfile'])->name('deleteAnotherProfile');
    });
});

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

require __DIR__.'/auth.php';
