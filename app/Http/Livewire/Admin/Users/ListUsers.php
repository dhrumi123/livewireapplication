<?php

namespace App\Http\Livewire\Admin\Users;
use App\Models\User;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Http\Livewire\Admin\AdminComponent;

class ListUsers extends AdminComponent
{
    public $state = [];
    public $showEditModal = false;
    public $user;
    public $userIdBeingRemoved = null;
    
    
    //Render page
    public function render(Request $request)
    {
        $users = User::latest()->paginate(5);
        return view('livewire.admin.users.list-users', [
            'users' => $users,
        ]);
    } 

    //Add new component
    public function addNew()
    {
        $this->state = [];
        $this->showEditModal = false;
        $this->dispatchBrowserEvent('show-form');   
    }

    //Edit component
    public function edit(User $user)
    {
        $this->showEditModal = true;
        $this->user = $user;
        $this->state = $user->toArray();
        $this->dispatchBrowserEvent('show-form');
    }

    //store user details
    public function createUser() {
       
        $validatedData = Validator::make($this->state, [ 
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed',
       ])->validate();
   
       $user = User::create($validatedData);
    
        if($user) {
            $this->dispatchBrowserEvent('hide-form', ['message' => 'User added successfully!']);
        }
           
    }

    //update user details
    public function updateUser() {
       
        $validatedData = Validator::make($this->state, [ 
        'name' => 'required',
        'email' => 'required|email|unique:users,email,'.$this->user->id,
        'password' => 'sometimes|confirmed',
       ])->validate();
   
       
        $user = $this->user->update($validatedData);
    
        if($user) {
            $this->dispatchBrowserEvent('hide-form', ['message' => 'User updated successfully!']); 
        }           
    }

    //confirm user removal component
    public function confirmUserRemoval($userId) {
     
        $this->userIdBeingRemoved = $userId;
        $this->dispatchBrowserEvent('show-delete-modal');
        
    }

    //delete User
    public function deleteUser() {
     
        $user = User::findOrFail($this->userIdBeingRemoved);
        $user->delete();
        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'User deleted successfully!']);        
    }
}   