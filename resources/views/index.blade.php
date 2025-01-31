@extends('layouts.app')

@section('content')
<h2>Book an Appointment</h2>
@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{ url('/appointments/store') }}" method="POST">
    @csrf
    <label>Name:</label> <input type="text" name="name" required>
    <label>Email:</label> <input type="email" name="email" required>
    <label>Doctor:</label> <input type="text" name="doctor" required>
    <label>Date:</label> <input type="date" name="date" required>
    <label>Time:</label> <input type="time" name="time" required>
    <button type="submit">Book Appointment</button>
</form>
@endsection
