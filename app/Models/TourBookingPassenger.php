<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourBookingPassenger extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function Passenger()
    {
        return $this->belongsTo(Passenger::class,'passenger_id','id');
    }

    public function TourBooking()
    {
        return $this->belongsTo(TourBooking::class,'booking_id','id');
    }
}
