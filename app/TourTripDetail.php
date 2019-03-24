<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourTripDetail extends Model
{
    public function tour(){
        return $this->belongsTo(Tour::class);
    }
}
