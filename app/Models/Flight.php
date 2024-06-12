<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Generator\StringManipulation\Pass\Pass;

class Flight extends Model
{
    use HasFactory;

    protected $table = 'my_flights';
    protected $primaryKey = 'flight_id';
    public $incrementing = 'false';
    public $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['flight_id', 'airline'];

    // A Flight has many Passengers
    public function passengers()
    {
        return $this->hasMany(Passenger::class, 'flight_id');
    }
}
