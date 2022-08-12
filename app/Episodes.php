<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodes extends Model
{
    public function series(){
        return $this->belongsTo(Series::class);
    }

    public function seasons(){
        return $this->belongsTo(Seasons::class);
    }
}
