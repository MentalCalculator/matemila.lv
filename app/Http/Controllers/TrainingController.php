<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Discipline;
use App\Models\User;
use App\Models\TrainingResult;

class TrainingController extends Controller
{
    public function instruction(){
        return view('training.instruction');
    }

    public function showDiscilpines(){
        $disciplines = Discipline::all();
        return view('training.discilpines', compact('disciplines'));
    }

    public function doDiscipline(Discipline $discipline, $mode){
        return view('training.game', ['discipline' => $discipline, 'mode' => $mode]);
    }

    public function saveTrainingResult(Discipline $discipline, $mode, Request $request){
        $auth = Auth::check();
        if($auth == true){
            $user = Auth::user()->id;
            $trainingResult = new TrainingResult();
            
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

    public function viewTrainingResult(Request $request){
        return view('training.result');
    }

    public function showResults(){
        return view('training.results');
    }
    
}
