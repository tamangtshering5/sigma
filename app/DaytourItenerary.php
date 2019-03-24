<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaytourItenerary extends Model
{
    public function daytour(){
        return $this->belongsTo(DayTour::class);
    }


}
