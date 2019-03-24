<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    public function touritenerary(){
        return $this->hasMany(TourItenerary::class,'Tour_id','id');
    }

    public function tourimgscroll(){
        return $this->hasMany(TourImgScroll::class,'Tour_id','id');
    }

    public function tourtripdetail(){
        return $this->hasMany(TourTripDetail::class,'Tour_id','id');
    }
}
