<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourDate;
class BookingController extends Controller
{
    
    public function getAvailableDates($id)
    {
        $tourDates = TourDate::where('tour_id',$id);
        if(!$tourDates->exists())
        {
            abort(404);
        }

        return Response()->json($tourDates->get());
    }

}
