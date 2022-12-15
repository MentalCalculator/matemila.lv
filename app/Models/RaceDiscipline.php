<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Discipline;
use App\Models\Race;
use App\Models\RaceResult;

class RaceDiscipline extends Model
{
    use HasFactory;

    public function discipline(){
        return $this->belongsTo(Discipline::class);
    }

    public function race(){
        return $this->belongsTo(Race::class);
    }

    public function raceResults(){
        return $this->hasMany(RaceResult::class);
    }

    protected $fillable = [
        'levelCount',
        'mode'
    ];
}
