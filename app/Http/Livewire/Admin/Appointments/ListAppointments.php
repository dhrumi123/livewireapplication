<?php

namespace App\Http\Livewire\Admin\Appointments;

use Livewire\Component;
use App\Models\Appointment;
use Livewire\WithPagination;
use App\Http\Livewire\Admin\AdminComponent;

class ListAppointments extends AdminComponent
{
   
    
    public function render()
    {
        $appointments = Appointment::with('client')->latest()->paginate();
        return view('livewire.admin.appointments.list-appointments', [
            'appointments' => $appointments,
        ]);
    }
}