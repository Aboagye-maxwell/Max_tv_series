<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seasons extends Model
{
    public function series(){
        return $this->belongsTo(Series::class);
    }

    public function episodes(){
        return $this->hasMany(Episodes::class);
    }
}
