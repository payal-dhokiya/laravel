<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        // Eager load passengers with flights to avoid N+1 query problem
        $flights = Flight::with('passengers')->get();
//        dd($flights);

        return view('flights.index', ['flights' => $flights]);
    }

}
