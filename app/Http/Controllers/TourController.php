<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TourRequest;
use App\Models\Tour;
use App\Models\TourDate;

class TourController extends Controller
{
    public function createTour(TourRequest $request)
    {
        $CreateTour = Tour::create([
            'name'=>$request['name'],
            'itinerary'=>$request['itinerary'],
            'status_id'=>1
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
        } 
    }



    public function getTourList(Request $request)
    {
        return Tour::all();
    }
}
