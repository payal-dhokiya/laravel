<?php

namespace Database\Seeders;

use App\Models\Passenger;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PassengersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Passenger::create([
        'flight_id' => '1',
            'name' => 'payal d',
        ]);
        Passenger::create([
            'flight_id' => '2',
            'name' => 'john doe',
        ]);
    }
}
