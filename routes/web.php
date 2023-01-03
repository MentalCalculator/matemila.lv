<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\MentalMathNewsController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\RacesController;
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
Route::get('/mentalmath/results/search', [TrainingController::class, 'showSearchResults'])->name('mentalMathSearchResults');
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

    //Route::delete('/delete_training_result', [TrainingController::class, 'deleteTrainingResult'])->name('deleteTrainingResult');

    Route::get('/races', [RacesController::class, 'showAllRaces'])->name('allRaces');
    Route::get('/races_archive', [RacesController::class, 'showRacesArchive'])->name('racesArchive');
    Route::get('/races/{raceId}', [RacesController::class, 'doRace'])->name('doRace');
    Route::get('/races/{raceId}/discipline/{disciplineId}', [RacesController::class, 'doRaceDiscipline'])->name('doRaceDiscipline');
    Route::post('/races/{raceId}/discipline/{disciplineId}/update', [RacesController::class, 'saveRaceDisciplineResult'])->name('saveRaceDisciplineResult');
    Route::get('/races/{raceId}/discipline/{disciplineId}/result', [RacesController::class, 'showRaceDisciplineResult'])->name('showRaceDisciplineResult');
    Route::get('/races/results/{raceId}', [RacesController::class, 'showRaceTotalResults'])->name('showRaceTotalResults');
    Route::get('/races/results/{raceId}/user/{userId}', [RacesController::class, 'showUserRaceResults'])->name('showUserRaceResults');

    Route::group(['middleware' => 'moderator'], function(){
        Route::get('/create_race', [RacesController::class, 'createRace'])->name('createRace');
        Route::post('/save_race', [RacesController::class, 'saveRace'])->name('saveRace');
        Route::get('/edit_race/{id}', [RacesController::class, 'editRace'])->name('editRace');
        Route::post('/update_race/{id}', [RacesController::class, 'updateRace'])->name('updateRace');
        Route::delete('/delete_race/{id}', [RacesController::class, 'deleteRace'])->name('deleteRace');
        Route::get('/edit_race_disciplines/{id}', [RacesController::class, 'editRaceDisciplines'])->name('editRaceDisciplines');
        Route::post('/edit_race_disciplines/{id}/add_discipline', [RacesController::class, 'addRaceDiscipline'])->name('addRaceDiscipline');
        Route::post('/edit/race_disciplines/{id}/update_discipline/{discId}', [RacesController::class, 'updateRaceDiscipline'])->name('updateRaceDiscipline');
        Route::delete('/edit/race_disciplines/{id}/delete_discipline/{discId}', [RacesController::class, 'deleteRaceDiscipline'])->name('deleteRaceDiscipline');
        Route::delete('/races/results/{raceId}/user/{userId}/delete/{raceDiscId}', [RacesController::class, 'deleteRaceDisciplineResult'])->name('deleteRaceDisciplineResult');
    });

    Route::group(['middleware' => 'admin'], function(){
        Route::get('/create_race', [RacesController::class, 'createRace'])->name('createRace');
        Route::post('/save_race', [RacesController::class, 'saveRace'])->name('saveRace');
        Route::get('/edit_race/{id}', [RacesController::class, 'editRace'])->name('editRace');
        Route::post('/update_race/{id}', [RacesController::class, 'updateRace'])->name('updateRace');
        Route::delete('/delete_race/{id}', [RacesController::class, 'deleteRace'])->name('deleteRace');
        Route::get('/edit_race_disciplines/{id}', [RacesController::class, 'editRaceDisciplines'])->name('editRaceDisciplines');
        Route::post('/edit_race_disciplines/{id}/add_discipline', [RacesController::class, 'addRaceDiscipline'])->name('addRaceDiscipline');
        Route::post('/edit/race_disciplines/{id}/update_discipline/{discId}', [RacesController::class, 'updateRaceDiscipline'])->name('updateRaceDiscipline');
        Route::delete('/edit/race_disciplines/{id}/delete_discipline/{discId}', [RacesController::class, 'deleteRaceDiscipline'])->name('deleteRaceDiscipline');
        Route::delete('/races/delete_discipline_result/{raceDiscId}', [RacesController::class, 'deleteRaceDisciplineResult'])->name('deleteRaceDisciplineResult');

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
