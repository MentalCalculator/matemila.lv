<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Discipline;
use App\Models\User;
use App\Models\Race;
use App\Models\RaceAccess;
use App\Models\RacesDiscipline;
use App\Models\RacesResult;

class RacesController extends Controller
{
    /* Sacensību galvenā lapa (Aktuālās sacensības) / The Races Main Page (Current Races) */
    public function showAllRaces(){
        $races = Race::latest()->paginate(20);
        return view('races.allRaces', compact('races'));
    }

    /* Sacensību galvenā lapa (Visas sacensības) / The Races Main Page (All Races) */
    public function showRacesArchive(){
        $races = Race::latest()->paginate(20);
        return view('races.racesArchive', compact('races'));
    }

    /* Sacensību izveidošanas lapa / The Race Creation Page */
    public function createRace(){
        return view('races.createRace');
    }

    /* Saglabāt sacensības / Save a Race */
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

    /* Sacensību rediģēšanas lapa / The Race Edit Page */
    public function editRace(Race $id){
        
        $user = Auth::user()->id;
        $userStatus = Auth::user()->status;

        if($userStatus == 'moderator' && $id->creator_id != $user){
            return redirect()->back()->with('message', '🚫 Jūs varat rediģēt tikai savas sacensības.');
        }
        else{
            return view('races.editRace', ['race' => $id]);
        }
    }

    /* Izdzēst sacensības / Delete a Race */
    public function deleteRace(Race $id){
        
        $id->delete();

        return redirect()->back()->with('message', '✅ Šīs sacensības ir izdzēstas.');
    }

    /* Atjaunināt sacensības / Update a Race */
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

    /* Sacensību disciplīnu rediģēšanas lapa / The Race Disciplines Edit Page */
    public function editRaceDisciplines(Race $id){
        $user = Auth::user()->id;
        $userStatus = Auth::user()->status;

        if($userStatus == 'moderator' && $id->creator_id != $user){
            return redirect()->back()->with('message', '🚫 Jūs varat rediģēt tikai savas sacensības.');
        }
        else{
            $disciplines = Discipline::all();
            $raceDisciplines = RacesDiscipline::where('race_id', '=', $id->id)->get();
            return view('races.editRaceDisciplines', [
                'race' => $id, 
                'disciplines' => $disciplines,
                'raceDisciplines' => $raceDisciplines
            ]);
        }
    }

    /* Pievienot sacensību disciplīnu / Add a Race Discipline */
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

    /* Atjaunināt sacensību disciplīnu / Update a Races Discipline */
    public function updateRaceDiscipline(Race $id, RacesDiscipline $discId, Request $request){

        $discId->update([
            'race_id' => $id->id,
            'discipline_id' => $request->discipline,
            'mode' => $request->mode,
            'levelCount' => $request->levelCount
        ]);

        RacesResult::where('race_discipline_id', '=', $discId->id)->delete();

        return redirect()->back()->with('message', '✅ Šī sacensību disciplīna ir atjaunināta.');
    }

    /* Izdzēst sacensību disciplīnu / Delete a Races Discipline */
    public function deleteRaceDiscipline(Race $id, RacesDiscipline $discId){
        
        $discId->delete();

        return redirect()->back()->with('message', '✅ Šī sacensību disciplīna ir izdzēsta.');
    }

    /* Sacensību lapa / The Race Page */
    public function doRace(Race $raceId){

        $user = Auth::user()->id;
        $userClass = Auth::user()->class;
        $userStatus = Auth::user()->status;

        /* Ja lietotājs neatbilst vajadzīgajai klašu grupai / If the User is not in the Required Class Group */
        if((($userClass < $raceId->minClass) || ($userClass > $raceId->maxClass)) && 
            (($userStatus == 'user') || ($userStatus == 'moderator' && $raceId->creator_id != $user))){
            echo "<script>";
            echo "alert('Pieeja šīm sacensībām ir slēgta, jo neesat vajadzīgajā klašu grupā.');";
            echo "window.close();";
            echo "</script>";
        }
        /* Ja sacensības pašreizējā brīdī nav pieejamas / If the Race is not available now */
        else if(((date("Y-m-d H:i:s") < $raceId->startTime) || (date("Y-m-d H:i:s") > $raceId->endTime)) &&
                (($userStatus == 'user') || ($userStatus == 'moderator' && $raceId->creator_id != $user))){
            echo "<script>";
            echo "alert('Pieeja šīm sacensībam tagad nav pieejama.');";
            echo "window.close();";
            echo "</script>";
        }
        else{
            /* Pārbaudīt, vai lietotājam ir sacensību piekļuve / Check If User has the Race Access */
            $raceAccessExists = RaceAccess::where('race_id', '=', $raceId->id)
                            ->where('user_id', '=', $user)
                            ->exists();

            /* Sacensību laiks minūtēs / The Races Time in Minutes */
            $raceMinutes = $raceId->minutes;

            /* Sacensību piekļuves pilnvaras izveidošana lietotājam / Creating the Race Access for the user */
            if(!$raceAccessExists){
                $raceAccess = new RaceAccess;

                if(($userStatus == 'user') || ($userStatus == 'moderator' && $raceId->creator_id != $user)){
                    $raceAccess->create([
                        'user_id' => $user,
                        'race_id' => $raceId->id,
                        'startTime' => date("Y-m-d H:i:s"),
                        'endTime' => date('Y-m-d H:i:s', strtotime("{$raceMinutes} minutes"))
                    ]);
                }
                else{
                    $raceAccess->create([
                        'user_id' => $user,
                        'race_id' => $raceId->id,
                        'startTime' => date("Y-m-d H:i:s"),
                        'endTime' => date('Y-m-d H:i:s', strtotime("1 year"))
                    ]);
                }
            }

            
            if($raceAccessExists){
                $raceAccess = RaceAccess::where('race_id', '=', $raceId->id)
                                    ->where('user_id', '=', $user)
                                    ->first();
                
                /* Sacensību piekļuves termiņa beigu laiks konkrētajam lietotājam / 
                   The Race Access Expire Time for Current User */
                $raceAccessExpireTime = $raceAccess->endTime;
            }

            /* Rādīt paziņojumu pēc sacensību piekļuves derīguma beigu laika /
               Show The Notification after The Race Access Expire Time  */ 
            if($raceAccessExists && (date("Y-m-d H:i:s") > $raceAccessExpireTime)){
                echo "<script>";
                echo "alert('Jūsu laiks šajās sacensībās ir beidzies. Paldies par Jūsu dalību!');";
                echo "window.close();";
                echo "</script>";
            }
            else{
                /* Iegūst visas vajadzīgās sacensību disciplīnas priekš konkrētajām sacensībām /
                   Get All Needed Race Disciplines for the Current Race */  
                $raceDisciplines = RacesDiscipline::where('race_id', '=', $raceId->id)
                ->join('disciplines', 'disciplines.id', '=', 'races_disciplines.discipline_id')
                ->selectRaw('disciplines.*, races_disciplines.*')
                ->get();

                /* Lietotāja rezultāti visās sacensību disciplīnās / 
                   The User Results of All Race Disciplines of the Current Race */
                $raceResults = RacesResult::where('user_id', '=', $user)
                            ->where('race_id', '=', $raceId->id)
                            ->get();

                /* Lietotāja kopējais rezultāts sacensībās / 
                   The User Total Result of the Race */
                $totalRaceResult = RacesResult::selectRaw('SUM(points) as points')
                                    ->where('race_id', '=', $raceId->id)
                                    ->where('user_id', '=', $user)
                                    ->groupBy('user_id')
                                    ->first();


                return view('races.gameMenu', [
                    'race' => $raceId, 
                    'raceDisciplines' => $raceDisciplines, 
                    'raceResults' => $raceResults,
                    'totalRaceResult' => $totalRaceResult,
                    'raceAccess' => $raceAccess
                ]);
            }
        }
    }

    /* Sacensību disciplīnas (ātrrēķināšanas spēles) lapa / The Race Discipline (Mental Math Game) Page */
    public function doRaceDiscipline(Race $raceId, RacesDiscipline $disciplineId){
        
        $user = Auth::user()->id;
        $userClass = Auth::user()->class;
        $userStatus = Auth::user()->status;

        /* Ja lietotājs neatbilst vajadzīgajai klašu grupai / If the User is not in the Required Class Group */
        if((($userClass < $raceId->minClass) || ($userClass > $raceId->maxClass)) && 
            (($userStatus == 'user') || ($userStatus == 'moderator' && $raceId->creator_id != $user))){
            echo "<script>";
            echo "alert('Pieeja šīm sacensībām ir slēgta, jo neesat vajadzīgajā klašu grupā.');";
            echo "window.close();";
            echo "</script>";
        }
        /* Ja sacensības pašreizējā brīdī nav pieejamas / If the Race is not available now */
        else if(((date("Y-m-d H:i:s") < $raceId->startTime) || (date("Y-m-d H:i:s") > $raceId->endTime)) &&
                (($userStatus == 'user') || ($userStatus == 'moderator' && $raceId->creator_id != $user))){
            echo "<script>";
            echo "alert('Pieeja šīm sacensībam tagad nav pieejama.');";
            echo "window.close();";
            echo "</script>";
        }
        else{
            /* Pārbaudīt, vai lietotājam ir sacensību piekļuve / Check If User has the Race Access */
            $raceAccessExists = RaceAccess::where('race_id', '=', $raceId->id)
                            ->where('user_id', '=', $user)
                            ->exists();

            /* Sacensību laiks minūtēs / The Races Time in Minutes */
            $raceMinutes = $raceId->minutes;

            /* Sacensību piekļuves pilnvaras izveidošana lietotājam, ja tā nav izveidota / 
               Creating the Race Access for the User, if it is not created */
            if(!$raceAccessExists){
                $raceAccess = new RaceAccess;

                if(($userStatus == 'user') || ($userStatus == 'moderator' && $raceId->creator_id != $user)){
                    $raceAccess->create([
                        'user_id' => $user,
                        'race_id' => $raceId->id,
                        'startTime' => date("Y-m-d H:i:s"),
                        'endTime' => date('Y-m-d H:i:s', strtotime("{$raceMinutes} minutes"))
                    ]);
                }
                else{
                    $raceAccess->create([
                        'user_id' => $user,
                        'race_id' => $raceId->id,
                        'startTime' => date("Y-m-d H:i:s"),
                        'endTime' => date('Y-m-d H:i:s', strtotime("1 year"))
                    ]);
                }
            }

            if($raceAccessExists){
                $raceAccess = RaceAccess::where('race_id', '=', $raceId->id)
                                    ->where('user_id', '=', $user)
                                    ->first();
                
                /* Sacensību piekļuves termiņa beigu laiks konkrētajam lietotājam / 
                   The Race Access Expire Time for Current User */
                $raceAccessExpireTime = $raceAccess->endTime;
            }

            /* Rādīt paziņojumu pēc sacensību piekļuves derīguma beigu laika /
               Show The Notification after The Race Access Expire Time  */ 
            if($raceAccessExists && (date("Y-m-d H:i:s") > $raceAccessExpireTime)){
                echo "<script>";
                echo "alert('Jūsu laiks šajās sacensībās ir beidzies. Paldies par Jūsu dalību!');";
                echo "window.close();";
                echo "</script>";
            }
            else{
                $raceDiscipline = RacesDiscipline::where('races_disciplines.id', '=', $disciplineId->id)
                                ->join('disciplines', 'disciplines.id', '=', 'races_disciplines.discipline_id')
                                ->selectRaw('disciplines.*, races_disciplines.*')
                                ->first();

                /*$raceAccess = RaceAccess::where('race_id', '=', $raceId->id)
                                ->where('user_id', '=', $user)
                                ->first();*/
                
                return view('races.gameDiscipline', [
                    'race' => $raceId, 
                    'raceDiscipline' => $raceDiscipline,
                    'raceAccess' => $raceAccess 
                ]);
            }
        }
    }

    /* Saglabāt rezultātu sacensību disciplīnā / Save a Result in the Race Discipline */
    public function saveRaceDisciplineResult(Race $raceId, RacesDiscipline $disciplineId, Request $request){
        
        $user = Auth::user()->id;

        $raceResultExists = RacesResult::where('user_id', '=', $user)
                            ->where('race_id', '=', $raceId->id)
                            ->where('race_discipline_id', '=', $disciplineId->id)
                            ->exists();

        /* Ja punktu skaits nav definēts / If Points are not defined */  
        if($request->points == null){
            $request->points = 0;
        }

        /* Ja rezultāts tiek saglabāts pirmo reizi / If a Result is saved the First Time */ 
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

            /* Labākais rezultāts sacensību disciplīnā / The Best Result in the Race Discipline */
            $bestResult = $raceResult->points;

            /* Ja pēdējais rezultāts ir lielāks par labāko rezultātu, atjaunināt sacensību disciplīnas rezultātu /
               If the last Result is greater than the Best Result, update the Race Discipline Result */
            if($request->points > $bestResult){
                $raceResult->update([
                    'points' => $request->points
                ]);

                return redirect()->route('showRaceDisciplineResult', [$raceId, $disciplineId])->with([
                    'points' => $request->points, 
                    'message' => '✅ Lieliski! Jūsu rezultāts ir uzlabots!'
                ]);
            }
            /* Ja pēdējais rezultāts ir mazāks par labāko rezultātu, rādīt vajadzīgo paziņojumu /
               If the last Result is less than the Best Result, show the Desired Notification */
            else{
                return redirect()->route('showRaceDisciplineResult', [$raceId, $disciplineId])->with([
                    'points' => $request->points, 
                    'message' => '😳 Jūsu rezultāts nav uzlabots, pamēģiniet vēlreiz!'
                ]);
            }
        }

    }

    /* Sacensību disciplīnas rezultāta lapa / The Race Discipline Result Page */
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

    /* Sacensību rezultātu lapa / The Race Results Page */
    public function showRaceTotalResults(Race $raceId, Request $request){
        

        if(request('place') == '' && request('school') == '' && request('minClass') == '' && request('maxClass') == ''){
            $raceTotalResults = RacesResult::selectRaw('@i := coalesce(@i + 1, 1) ranking, users.*, SUM(points) as points, races_results.user_id')
                                ->join('users', 'users.id', '=', 'races_results.user_id')
                                ->where('races_results.race_id', '=', $raceId->id)
                                ->groupBy('user_id')
                                ->orderBy('points', 'desc')
                                ->latest()
                                ->paginate(50);
        }
        else{
            $raceTotalResults = RacesResult::selectRaw('@i := coalesce(@i + 1, 1) ranking, users.*, SUM(points) as points, races_results.user_id')
                                ->join('users', 'users.id', '=', 'races_results.user_id')
                                ->where('users.place', 'like', '%' . request('place') . '%')
                                ->where('users.school', 'like', '%' . request('school') . '%')
                                ->whereBetween('users.class', [request('minClass'), request('maxClass')])
                                ->where('races_results.race_id', '=', $raceId->id)
                                ->groupBy('user_id')
                                ->orderBy('points', 'desc')
                                ->latest()
                                ->paginate(50);
        }

        $fields = array(
            "place" => $request->place,
            "school" => $request->school,
            "minClass" => $request->minClass,
            "maxClass" => $request->maxClass    
        );

        return view('races.totalResults', [
            'raceTotalResults' => $raceTotalResults,
            'race' => $raceId,
            'fields' => $fields
        ]);
    }

    /* Rādīt dalībnieka sacensību disciplīnu rezultātus / Show Race Disciplines Results of a Participant */
    public function showUserRaceResults(Race $raceId, $userId){

        $raceDisciplineResults = RacesResult::selectRaw('races_results.id, disciplines.name as disciplineName, disciplines.numbers_type as disciplineNumbersType, races_disciplines.mode, races_results.user_id, races_results.points')
                                ->where('races_results.race_id', '=', $raceId->id)
                                ->where('races_results.user_id', '=', $userId)
                                ->join('races_disciplines', 'races_disciplines.id', '=', 'races_results.race_discipline_id')
                                ->join('disciplines', 'disciplines.id', '=', 'races_disciplines.discipline_id')
                                ->get();

        $user = User::where('id', '=', $userId)->first();

        return view('races.disciplinesResults', [
            'raceDisciplineResults' => $raceDisciplineResults,
            'race' => $raceId,
            'user' => $user
        ]);
    }

    /* Izdzēst sacensību disciplīnas rezultātu / Delete a Race Discipline Result */
    public function deleteRaceDisciplineResult(Race $raceId, User $userId, RacesResult $raceDiscId){
        
        $raceDiscId->delete();

        return redirect()->back()->refresh()->with('message', '✅ Šīs sacensību disciplīnas rezultāts ir izdzēsts.');
    }
}
