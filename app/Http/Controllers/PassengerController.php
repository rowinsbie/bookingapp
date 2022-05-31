<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passenger;
class PassengerController extends Controller
{
    public function index(Request $request)
    {
        $id =  $request['id'];
        return Passenger::find($id);
    }

    public function update(Request $request)
    {
        $isUpdated = Passenger::find($request['id'])
        ->update([
            'given_name'=>$request['given_name'],
            'surname'=>$request['surname'],
            'email'=>$request['email'],
            'mobile'=>$request['mobile'],
            'passport'=>$request['passport']
        ]);

        return $request->all();
    }
}
