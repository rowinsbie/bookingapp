<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourBooking extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Tour()
    {
        return $this->belongsTo(Tour::class,'tour_id','id');
    }

    public function PassengerBooking()
    {
        return $this->hasMany(TourBookingPassenger::class,'booking_id','id');
    }
}
