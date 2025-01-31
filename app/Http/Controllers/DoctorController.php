<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentConfirmed;

class DoctorController extends Controller {
    public function dashboard($id) {
        $appointments = Appointment::where('doctor', $id)->where('status', 'Pending')->get();
        return view('doctors.dashboard', compact('appointments', 'id'));
    }

    public function update(Request $request) {
        $appointment = Appointment::find($request->appointment_id);
        if (!$appointment) {
            return back()->with('error', 'Appointment not found.');
        }

        $appointment->status = $request->action == 'accept' ? 'Accepted' : 'Rejected';
        $appointment->save();

        if ($request->action == 'accept') {
            Mail::to($appointment->email)->send(new AppointmentConfirmed($appointment));
            return back()->with('success', 'Appointment accepted and email sent.');
        }

        return back()->with('success', 'Appointment rejected.');
    }
}
