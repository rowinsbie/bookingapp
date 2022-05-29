<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;

    protected $guarded = [];    

    public function PassengerBooking()
    {
        return $this->hasMany(TourBookingPassenger::class,'passenger_id','id');
    }
}
