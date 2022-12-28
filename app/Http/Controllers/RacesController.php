<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Discipline;
use App\Models\User;
use App\Models\Race;
use App\Models\RaceDiscipline;
use App\Models\RacesResult;

class RacesController extends Controller
{
    public function showAllRaces(){
        $races = Race::latest()->paginate(20);
        return view('races.allRaces', compact('races'));
    }

    public function createRace(){
        return view('races.createRace');
    }

    public function saveRace(Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:64']
        ]);

        $user = Auth::user()->id;
        $race = new Race();

        $race->create([
            'creator_id' => $user,
            'name' => $request->title,
            'description' => $request->description,
            'startTime' => $request->startTime,
            'endTime' => $request->endTime,
            'minClass' => $request->minClass,
            'maxClass' => $request->maxClass,
            'minutes' => $request->minutes
        ]);

        return redirect(route('allRaces'))->with('message', '✅ Sacensības ir izveidotas.');
    }

    public function editRace(Race $id){
        return view('races.editRace', ['race' => $id]);
    }

    public function updateRace(Race $id, Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:64']
        ]);

        $id->update([
            'name' => $request->title,
            'description' => $request->description,
            'startTime' => $request->startTime,
            'endTime' => $request->endTime,
            'minClass' => $request->minClass,
            'maxClass' => $request->maxClass,
            'minutes' => $request->minutes
        ]);

        return redirect(route('allRaces'))->with('message', '✅ Sacensības ir atjauninātas.');
    }

    public function editRaceDisciplines(Race $id){
        return view('races.editRaceDisciplines', ['race' => $id]);
    }
}
