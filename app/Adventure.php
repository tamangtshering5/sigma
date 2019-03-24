<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adventure extends Model
{
    public function adventureitenerary(){
        return $this->hasMany(AdventureItenerary::class,'Adventure_id','id');
    }

    public function advenscrollimg(){
        return $this->hasMany(AdvenScrollImg::class,'Adventure_id','id');
    }

    public function adventuretripdetail(){
        return $this->hasMany(AdventureTripDetail::class,'Adventure_id','id');
    }
}
