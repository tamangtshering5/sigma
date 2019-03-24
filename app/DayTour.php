<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DayTour extends Model
{
    public function daytouritenerary(){
        return $this->hasMany(DaytourItenerary::class,'DayTour_id','id');
    }

    public function daytourscrollimg(){
        return $this->hasMany(DaytourScrollImg::class,'DayTour_id','id');
    }

    public function daytripdetail(){
        return $this->hasMany(DayTripDetail::class,'DayTour_id','id');
    }
}
