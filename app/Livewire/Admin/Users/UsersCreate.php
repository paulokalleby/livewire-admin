<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Forms\User\UserStoreForm;
use App\Models\Role;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class UsersCreate extends Component
{
    public UserStoreForm $form; 

    public function render()
    {
        return view('.admin.users.users-create')->with([
            'roles' => Role::whereActive(true)->orderBy('name')->get()
        ]);
    }

    public function store() : void
    {
        $this->form->store();

        Toaster::success('Usuário cadastrado com sucesso!');
    }
}
