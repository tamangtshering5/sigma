<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndiaTour extends Model
{
    public function indiaitenerary(){
        return $this->hasMany(IndiaItenerary::class,'IndiaTour_id','id');
    }

    public function indiascrollimg(){
        return $this->hasMany(IndiaScrollImg::class,'IndiaTour_id','id');
    }

    public function indiatripdetail(){
        return $this->hasMany(IndiaTripDetail::class,'IndiaTour_id','id');
    }
}
