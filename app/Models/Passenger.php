<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;

    protected $fillable = ['flight_id', 'name'];

    // Each Passenger belongs to a Flight
    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flight_id');
    }
}
