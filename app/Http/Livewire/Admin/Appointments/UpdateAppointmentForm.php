<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Client;
use Livewire\Component;
use App\Models\Appointment;

class UpdateAppointmentForm extends Component
{
    public $state = [];

    public function mount(Appointment $appointment)  
    {
        $this->state = $appointment->toArray();
     }

    public function render()
    {
        $clients = Client::all();
        return view('livewire.admin.appointments.update-appointment-form', [
            'clients' => $clients
        ]);
    }
}