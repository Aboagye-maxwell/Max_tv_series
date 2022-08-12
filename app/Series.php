<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    public function seasons(){
        return $this->hasMany(Seasons::class);
    }

    public function episodes(){
        return $this->hasMany(Episodes::class);
    }
}
