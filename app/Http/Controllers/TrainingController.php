<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Discipline;
use App\Models\User;
use App\Models\TrainingResult;

class TrainingController extends Controller
{
    /* Instrukcijas lapa / The Instruction Page */ 
    public function instruction(){
        return view('training.instruction');
    }

    /* Treniņu lauku lapa / The Training Fields Page */
    public function showDiscilpines(){
        $disciplines = Discipline::all();
        return view('training.discilpines', compact('disciplines'));
    }

    /* Veikt ātrrēķināšanas spēli (treniņu disciplīnu) / Do Mental Meth Game (training discipline) */
    public function doDiscipline(Discipline $discipline, $mode){
        if($mode != 'normal' && $mode != 'sprint' && $mode != 'variants'){
            return redirect()->back()->with('message', 'Ir jāizvēlais pareizais režīms.');
        }
        else{
            return view('training.game', ['discipline' => $discipline, 'mode' => $mode]);
        }
    }

    /* Saglabāt ātrrēķināšanas spēles (treniņa) rezultātu izvēlētajā disciplīnā /
       Save Mental Math Game (Training) Result in the Selected Discipline */
    public function saveTrainingResult(Discipline $discipline, $mode, Request $request){
        $auth = Auth::check();
        if($auth == true){
            $user = Auth::user()->id;
            $trainingResult = new TrainingResult();

            if($request->points == null){
                $request->points = 0;
            }
            
            $trainingResult->create([
                'user_id' => $user,
                'discipline_id' => $discipline->id,
                'level' => $request->level,
                'mode' => $mode,
                'points' => $request->points
            ]);
            
           return redirect(route('viewTrainingResult'))->with('message', '✅ Jūsu rezultāts ir saglabāts.')->with([
                'discipline' => $discipline->id, 
                'level' => $request->level,
                'mode' => $mode,
                'points' => $request->points,
                'errors' => $request->errors
                ]);
        }
        else{
            return redirect(route('viewTrainingResult'))->with('message', 'Lai saglabātu savu rezultātu, ir nepieciešams ieiet sistēmā.')->with([
                'discipline' => $discipline->id, 
                'level' => $request->level,
                'mode' => $mode,
                'points' => $request->points,
                'errors' => $request->errors
                ]);
        }
    }

    /* Apskatīt ātrrēķināšanas spēles (treniņa) rezultātu izvēlētajā disciplīnā /
       View Mental Math Game (Training) Result in the Selected Discipline */
    public function viewTrainingResult(Request $request){
        return view('training.result');
    }

    /* Treniņu rezultātu lapa / Training Results Page */
    public function showResults(Request $request){
        return view('training.results');
    }

    /* Rādīt rezultātus treniņu rezultātu lapā / Show results in the Training Results Page */
    public function showSearchResults(Request $request){

        $trainingResults = DB::table('training_results')
                            ->join('disciplines', 'disciplines.id', '=', 'training_results.discipline_id')
                            ->join('users', 'users.id', '=', 'training_results.user_id')
                            ->selectRaw('training_results.id, user_id, discipline_id, users.username, users.class, users.school, users.place, MAX(points) as points, training_results.created_at, training_results.updated_at')->groupBy('user_id')
                            ->where('disciplines.short_name', 'like', '%' . request('discipline') . '%')
                            ->where('disciplines.numbers_type', 'like', '%' . request('numbersType') . '%')
                            ->where('training_results.mode', 'like', '%' . request('disciplineMode') . '%')
                            ->where('training_results.level', 'like', '%' . request('levelMode') . '%')
                            ->where('users.place', 'like', '%' . request('place') . '%')
                            ->where('users.school', 'like', '%' . request('school') . '%')
                            ->whereBetween('class', [request('minClass'), request('maxClass')])
                            ->orderBy('points', 'desc')
                            ->latest()
                            ->paginate(50);

        $fields = array(
            "discipline" => $request->discipline,
            "numbersType" => $request->numbersType,
            "disciplineMode" => $request->disciplineMode,
            "levelMode" => $request->levelMode,
            "place" => $request->place,
            "school" => $request->school,
            "minClass" => $request->minClass,
            "maxClass" => $request->maxClass    
        );

        return view('training.searchResults', compact('trainingResults', 'fields'));
    }

    /*public function deleteTrainingResult (TrainingResult $id){
        $id->delete();
        return redirect()->back()->with('message', '✅ Šis rezultāts ir izdzēsts.');
    }*/
    
}
