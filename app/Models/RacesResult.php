<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Race;
use App\Models\RacesDiscipline;

class RacesResult extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function race(){
        return $this->belongsTo(Race::class);
    }

    public function raceDiscipline(){
        return $this->belongsTo(RaceDiscipline::class);
    }

    protected $fillable = [
        'user_id',
        'race_id',
        'race_discipline_id',
        'points'
    ];
}
