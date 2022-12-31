<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TrainingResult;
use App\Models\RacesDiscipline;

class Discipline extends Model
{
    use HasFactory;

    public function trainingResults(){
        return $this->hasMany(TrainingResult::class);
    }

    public function raceDisciplines(){
        return $this->hasMany(RaceDiscipline::class);
    }

    protected $fillable = [
        'name',
        'number_type'
    ];
}

