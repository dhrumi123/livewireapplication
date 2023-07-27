<?php

namespace App\Http\Livewire\Admin\Appointments;

use Livewire\Component;
use Livewire\WithPagination;

class ListAppointments extends AdminComponent
{
   
    
    public function render()
    {
        return view('livewire.admin.appointments.list-appointments');
    }
}