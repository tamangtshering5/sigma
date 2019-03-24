<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndiaTripDetail extends Model
{
    public function indiatour(){
        return $this->belongsTo(IndiaTour::class);
    }
}
