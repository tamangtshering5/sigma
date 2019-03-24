<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndiaItenerary extends Model
{
    public function indiatour(){
        return $this->belongsTo(IndiaTour::class);
    }
}
