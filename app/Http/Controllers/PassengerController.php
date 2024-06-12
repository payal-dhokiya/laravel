<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Passenger;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    public function create()
    {
        $flights = Flight::all();
        return view('passengers.create', compact('flights'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'flight_id' => 'required',
            'name' => 'required',
        ]);

        $input = [
            'flight_id' =>  $request['flight_id'],
            'name' => $request['name']
        ];

        dd($input);
        Passenger::create($input);

        return redirect()->route('passengers.index')->with('success', 'Passenger added successfully!');
    }

}
