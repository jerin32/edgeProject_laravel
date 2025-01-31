<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class AppointmentConfirmed extends Mailable {
    public $appointment;
    public function __construct($appointment) {
        $this->appointment = $appointment;
    }

    public function build() {
        return $this->subject('Appointment Confirmation')
                    ->view('emails.confirmation')
                    ->with('appointment', $this->appointment);
    }
}

