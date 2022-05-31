<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passenger;

use App\Http\Requests\PassengerRequest;

class PassengerController extends Controller
{
    public function index(Request $request)
    {
        $id =  $request['id'];
        return Passenger::find($id);
    }

    public function update(PassengerRequest $request)
    {
        $isUpdated = Passenger::find($request['id'])
        ->update([
            'given_name'=>$request['given_name'],
            'surname'=>$request['surname'],
            'email'=>$request['email'],
            'mobile'=>$request['mobile'],
            'passport'=>$request['passport'],
            'birthdate'=>date('Y-m-d',strtotime($request['birthdate'])),
        ]);

        return $request->all();
    }
}
