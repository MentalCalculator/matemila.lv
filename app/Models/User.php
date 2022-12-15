<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\TrainingResult;
use App\Models\Race;
use App\Models\RaceResult;
use App\Models\NewsRecord;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    public function trainingResults(){
        return $this->hasMany(TrainingResult::class);
    }

    public function races(){
        return $this->hasMany(Race::class);
    }

    public function raceResults(){
        return $this->hasMany(RaceResult::class);
    }

    public function newsRecords(){
        return $this->hasMany(newsRecord::class);
    }
    

    protected $fillable = [
        'username',
        'name',
        'surname',
        'phone',
        'place',
        'school',
        'class',
        'email',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
