<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndiaScrollImg extends Model
{
    public function indiatour(){
        return $this->belongsTo(IndiaTour::class);
    }
}
