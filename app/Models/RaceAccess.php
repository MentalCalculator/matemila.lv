<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Race;
use App\Models\User;

class RaceAccess extends Model
{
    use HasFactory;

    public function race(){
        return $this->belongsTo(Race::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'race_id',
        'startTime',
        'endTime'
    ];

    public $timestamps = false;
}
