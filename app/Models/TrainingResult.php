<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Discipline;

class TrainingResult extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function discipline(){
        return $this->belongsTo(Discipline::class);
    }

    protected $fillable = [
        'user_id',
        'discipline_id',
        'level',
        'mode',
        'points'
    ];
}
