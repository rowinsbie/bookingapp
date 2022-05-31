<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourDate;
use App\Models\Passenger;
use App\Models\TourBooking as Booking;
use App\Models\TourBookingPassenger;

class BookingController extends Controller
{
    
    public function getAvailableDates($id)
    {
        $tourDates = Booking::where('tour_id',$id);
        if(!$tourDates->exists())
        {
            abort(404);
        }

        return Response()->json($tourDates->get());
    }

    public function BookingProcess(Request $request)
    {
        $Passenger = $this->savePassengerInformation($request);
        if($Passenger)
        {
            $Booking = Booking::where('tour_id',$request['data']['tourID'])
            ->where('tour_date',$request['data']['date'])->first();
            if($Booking)
            {
                $this->BookPassenger($request,$Passenger->id,$Booking->id);
            }
        }

        
    }

    private function savePassengerInformation(Request $request)
    {
        $input = $request['data'];
        $isCreated = Passenger::create([
            'given_name'=>$input['given_name'],
            'surname'=>$input['surname'],
            'email'=>$input['email'],
            'mobile'=>$input['mobile'],
            'passport'=>$input['passport'],
            'birthdate'=>date('Y-m-d',strtotime($input['birthDate'])),
            'status_id'=>1
        ]);
        if($isCreated)
        {
            return $isCreated;
        }
       

    }



    private function BookPassenger($request,$PassengerID,$BookingID)
    {
        $isPassengerHasBeenBooked = TourBookingPassenger::create([
            'booking_id'=>$BookingID,
            'passenger_id'=>$PassengerID,
            'special_request'=> $request['data']['Request']
        ]);
    }


    public function ShowAllPassengers(Request $request)
    {
        $date = $request['date'];
        $tourID = $request['tourID'];
        $Passengers = TourBookingPassenger::with(['TourBooking','Passenger'])
        ->whereHas('TourBooking',function($q) use ($date,$tourID)
        {
            $q->where('tour_date',$date);
            // $q->where('tour_id',$tourID);
        })
        ->get();
        return $Passengers;
    }

    public function Remove(Request $request)
    {
        $removePassenger = Passenger::find($request['passengerID'])->delete();
        $removePassengerBooking = TourBookingPassenger::where('passenger_id',$request['passengerID'])->delete();
    }

}
