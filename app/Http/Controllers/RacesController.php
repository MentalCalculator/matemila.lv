<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Discipline;
use App\Models\User;
use App\Models\Race;
use App\Models\RacesDiscipline;
use App\Models\RacesResult;

class RacesController extends Controller
{
    public function showAllRaces(){
        $races = Race::latest()->paginate(20);
        return view('races.allRaces', compact('races'));
    }

    public function showRacesArchive(){
        $races = Race::latest()->paginate(20);
        return view('races.racesArchive', compact('races'));
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

    public function deleteRace(Race $id){
        
        $id->delete();

        return redirect()->back()->with('message', '✅ Šīs sacensības ir izdzēstas.');
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
        $disciplines = Discipline::all();
        $raceDisciplines = RacesDiscipline::where('race_id', '=', $id->id)->get();
        return view('races.editRaceDisciplines', [
            'race' => $id, 
            'disciplines' => $disciplines,
            'raceDisciplines' => $raceDisciplines
        ]);
    }

    public function addRaceDiscipline(Race $id, Request $request){
        
        $raceDiscipline = new RacesDiscipline();

        $raceDiscipline->create([
            'race_id' => $id->id,
            'discipline_id' => $request->discipline,
            'mode' => $request->mode,
            'levelCount' => $request->levelCount
        ]);

        return redirect()->back()->with('message', '✅ Sacensību disciplīna ir pievienota.');
    }

    public function updateRaceDiscipline(Race $id, RacesDiscipline $discId, Request $request){

        $discId->update([
            'race_id' => $id->id,
            'discipline_id' => $request->discipline,
            'mode' => $request->mode,
            'levelCount' => $request->levelCount
        ]);

        return redirect()->back()->with('message', '✅ Šī sacensību disciplīna ir atjaunināta.');
    }

    public function deleteRaceDiscipline(Race $id, RacesDiscipline $discId){
        
        $discId->delete();

        return redirect()->back()->with('message', '✅ Šī sacensību disciplīna ir izdzēsta.');
    }

    public function doRace(Race $raceId){

        $user = Auth::user()->id;

        $raceDisciplines = RacesDiscipline::where('race_id', '=', $raceId->id)
        ->join('disciplines', 'disciplines.id', '=', 'races_disciplines.discipline_id')
        ->selectRaw('disciplines.*, races_disciplines.*')
        ->get();

        $raceResults = RacesResult::where('user_id', '=', $user)
                    ->where('race_id', '=', $raceId->id)
                    ->get();

        $totalRaceResult = RacesResult::selectRaw('SUM(points) as points')
                            ->where('race_id', '=', $raceId->id)
                            ->where('user_id', '=', $user)
                            ->groupBy('user_id')
                            ->first();


        return view('races.gameMenu', [
            'race' => $raceId, 
            'raceDisciplines' => $raceDisciplines, 
            'raceResults' => $raceResults,
            'totalRaceResult' => $totalRaceResult
        ]);
    }

    public function doRaceDiscipline(Race $raceId, RacesDiscipline $disciplineId){
        
        $raceDiscipline = RacesDiscipline::where('races_disciplines.id', '=', $disciplineId->id)
                        ->join('disciplines', 'disciplines.id', '=', 'races_disciplines.discipline_id')
                        ->selectRaw('disciplines.*, races_disciplines.*')
                        ->first();
        
        return view('races.gameDiscipline', ['race' => $raceId, 'raceDiscipline' => $raceDiscipline]);
    }

    public function saveRaceDisciplineResult(Race $raceId, RacesDiscipline $disciplineId, Request $request){
        
        $user = Auth::user()->id;

        $raceResultExists = RacesResult::where('user_id', '=', $user)
                            ->where('race_id', '=', $raceId->id)
                            ->where('race_discipline_id', '=', $disciplineId->id)
                            ->exists();

        if(!$raceResultExists){
            $raceResult = new RacesResult;

            $raceResult->create([
                'user_id' => $user,
                'race_id' => $raceId->id,
                'race_discipline_id' => $disciplineId->id,
                'points' => $request->points
            ]);

            return redirect()->route('showRaceDisciplineResult', [$raceId, $disciplineId])->with([
                'points' => $request->points, 
                'message' => '✅ Jūsu rezultāts ir saglabāts!'
            ]);
        }
        else{
            $raceResult = RacesResult::where('user_id', '=', $user)
                        ->where('race_id', '=', $raceId->id)
                        ->where('race_discipline_id', '=', $disciplineId->id)
                        ->first();

            $bestResult = $raceResult->points;

            if($request->points > $bestResult){
                $raceResult->update([
                    'points' => $request->points
                ]);

                return redirect()->route('showRaceDisciplineResult', [$raceId, $disciplineId])->with([
                    'points' => $request->points, 
                    'message' => '✅ Lieliski! Jūsu rezultāts ir uzlabots!'
                ]);
            }
            else{
                return redirect()->route('showRaceDisciplineResult', [$raceId, $disciplineId])->with([
                    'points' => $request->points, 
                    'message' => '😳 Jūsu rezultāts nav uzlabots, pamēģiniet vēlreiz!'
                ]);
            }
        }

    }

    public function showRaceDisciplineResult(Race $raceId, RacesDiscipline $disciplineId){

        $user = Auth::user()->id;

        $raceDiscipline = RacesDiscipline::where('races_disciplines.id', '=', $disciplineId->id)
                        ->join('disciplines', 'disciplines.id', '=', 'races_disciplines.discipline_id')
                        ->selectRaw('disciplines.*, races_disciplines.*')
                        ->first();

        $raceResult = RacesResult::where('user_id', '=', $user)
                    ->where('race_id', '=', $raceId->id)
                    ->where('race_discipline_id', '=', $disciplineId->id)
                    ->first();

        return view('races.gameResult', ['race' => $raceId, 'raceDiscipline' => $raceDiscipline, 'raceResult' => $raceResult]);
    }
}
