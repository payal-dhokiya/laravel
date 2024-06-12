<?php

namespace Database\Seeders;

use App\Models\Flight;
use Illuminate\Database\Seeder;

class FlightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Flight::create([
            'flight_id' => 'FL456',
            'airline' => 'Demo Airline',
        ]);
        Flight::create([
            'flight_id' => 'FL256',
            'airline' => 'Dummy Airline',
        ]);

    }
}
