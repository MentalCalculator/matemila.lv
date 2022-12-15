<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\RaceDiscipline;
use App\Models\RaceResult;

class Race extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function raceDisciplines(){
        return $this->hasMany(RaceDiscipline::class);
    }

    public function raceResults(){
        return $this->hasMany(RaceResult::class);
    }

    protected $fillable = [
        'name',
        'description',
        'minClass',
        'maxClass',
        'startTime',
        'endTime'
    ];
}
