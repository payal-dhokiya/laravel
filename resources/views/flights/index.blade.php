<!DOCTYPE html>
<html>
<head>
    <title>Flights and Passengers</title>
</head>
<body>
<h3>Flights and Their Passengers</h3>
@foreach ($flights as $flight)
    <h4>{{ $flight->airline }} - Flight ID: {{ $flight->flight_id }}</h4>
    <ul>
        @foreach ($flight->passengers as $passenger)
            <li>{{ $passenger->name }} (Passenger ID: {{ $passenger->id }})</li>
        @endforeach
    </ul>
@endforeach
</body>
</html>
