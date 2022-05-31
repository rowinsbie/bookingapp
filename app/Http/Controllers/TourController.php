<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TourRequest;
use App\Models\Tour;
use App\Models\TourDate;
use App\Models\TourBooking as Booking;

class TourController extends Controller
{
    public function createTour(TourRequest $request)
    {
        $CreateTour = Tour::create([
            'name'=>$request['name'],
            'itinerary'=>$request['itinerary'],
            'status_id'=>2
        ]);
        if($CreateTour)
        {
            foreach($request['dates'] as $date)
            {
                TourDate::create([
                    'tour_id'=>$CreateTour->id,
                    'date'=>Date('Y-m-d',strtotime($date)),
                    'status_id'=>1
                ]);
            }
            $this->makeTourBooking($CreateTour->id);
        } 
    }

    private function makeTourBooking($tourID)
    {
        foreach(TourDate::where('tour_id',$tourID)->get() as $date)
        {
            $isBooked = Booking::create([
                'tour_id'=>$tourID,
                'tour_date'=>$date->date,
                'status_id'=>1
            ]);
        }
        
    }


    public function getTourList(Request $request)
    {
        return Tour::all();
    }

    public function UpdateDateStatus(Request $request)
    {
        $status = 1;
        if($request['current_status'] == 1)
        {
            $status = 2;
        }

        $isUpdated = TourDate::find($request['id'])
        ->update([
            'status_id'=>$status
        ]);

    }


    public function UpdateTourInformation(Request $request)
    {
        $isUpdated = Tour::find($request['id'])
        ->update([
            'name'=>$request['name'],
            'itinerary'=>$request['itinerary']
        ]);
    }

    public function showTourDetails($id)
    {
        $Tour = Tour::with(['TourDate.TourDateStatus'])->find($id);
        if(!$Tour->exists())
        {
            abort(404);
        }

        return Response()->json([
            'tour'=>$Tour
        ]);
       
    }

}
