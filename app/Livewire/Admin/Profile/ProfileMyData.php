<?php

namespace App\Livewire\Admin\Profile;

use App\Livewire\Forms\Profile\ProfileForm;
use App\Traits\HasAuthenticatedUser;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class ProfileMyData extends Component
{
    use HasAuthenticatedUser;
    
    public ProfileForm $form; 

    public function render()
    {
        return view('.admin.profile.profile-my-data');
    }
    public function mount()
    {   
        $this->form->setUser($this->getUser());
    }

    public function save() : void
    {

        $this->validate();

        $this->form->update();

        Toaster::success('Dados atualizados com sucesso!');

    }

}
