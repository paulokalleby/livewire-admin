<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Forms\User\UserUpdateForm;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class UsersEdit extends Component
{
    public UserUpdateForm $form; 

    public $roles;

    public function render()
    {
        return view('admin.users.users-edit')->with([
            'roles' => Role::orderBy('name')->get()
        ]);
    }

    public function mount(User $user)
    {
        $this->form->setUser($user);

        $this->roles = Role::whereActive(true)->orderBy('name')->get();
    }

    public function update() : void
    {

        $this->validate();

        $this->form->update();

        Toaster::success('Usuário atualizado com sucesso!');

    }

    public function selectAll()
    {
        foreach($this->roles as $role) {
            $this->form->role[$role->id] = true;
        }     
    }

    public function clearSelection()
    {
        $this->form->role = [];
    }

}
