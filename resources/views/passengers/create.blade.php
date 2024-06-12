@extends('layouts.app')

@section('content')
        <form action="{{ route('passengers.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="flight_id">Flight:</label>
                <select class="form-control" id="flight_id" name="flight_id">
                    @foreach($flights as $flight)
                        <option value="{{ $flight->id }}">{{ $flight->flight_id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Passenger Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

@endsection
