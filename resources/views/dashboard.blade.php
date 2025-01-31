@extends('layouts.app')

@section('content')
<h2>Doctor Dashboard</h2>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1">
    <tr>
        <th>Patient Name</th>
        <th>Email</th>
        <th>Date</th>
        <th>Time</th>
        <th>Action</th>
    </tr>
    @foreach($appointments as $appointment)
        <tr>
            <td>{{ $appointment->name }}</td>
            <td>{{ $appointment->email }}</td>
            <td>{{ $appointment->date }}</td>
            <td>{{ $appointment->time }}</td>
            <td>
                <form action="{{ url('/doctor/appointment/update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                    <button type="submit" name="action" value="accept">Accept</button>
                    <button type="submit" name="action" value="reject">Reject</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection
