<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Client;
use Livewire\Component;
use App\Models\Appointment;
use Illuminate\Support\Facades\Validator;

class CreateAppointmentForm extends Component
{
    public $state = [
        'status' => '1', //scheduled
    ];
    public function render()
    {
        $clients = Client::all();
        return view('livewire.admin.appointments.create-appointment-form',[
            'clients' => $clients
        ]);
    }

    public function createAppointment() {

        $validatedData = Validator::make($this->state, [ 
            'client_id' => 'required',
            'status' => 'required',
            'date' => 'required',
            'time' => 'required',
            'note' => 'nullable',
        ],
        [
            'client_id.required' => 'Client field is required'
        
        ])->validate();
        
        $appointment = Appointment::create($validatedData);

        $this->dispatchBrowserEvent('alert',['message' => 'Appointment Created Successfully']);
    }
}