<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller {
    public function index() {
        $appointments = Appointment::where('status', 'Pending')->get();
        return view('appointments.index', compact('appointments'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'doctor' => 'required',
            'date' => 'required|date',
            'time' => 'required'
        ]);

        $existingAppointment = Appointment::where('doctor', $request->doctor)
                                          ->where('date', $request->date)
                                          ->where('time', $request->time)
                                          ->first();

        if ($existingAppointment) {
            return back()->with('error', 'The selected time slot is already booked. Choose a different time.');
        }

        Appointment::create([
            'name' => $request->name,
            'email' => $request->email,
            'doctor' => $request->doctor,
            'date' => $request->date,
            'time' => $request->time,
            'status' => 'Pending'
        ]);

        return redirect('/')->with('success', 'Appointment submitted! Status: Pending.');
    }
}

