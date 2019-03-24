<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourItenerary extends Model
{
    public function tour(){
        return $this->belongsTo(Tour::class);
    }
}
