<?php

namespace App\Livewire\Admin\Settings;

use App\Livewire\Forms\Tenant\TenantForm;
use App\Traits\HasAuthenticatedUser;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class SettingsBasicInformation extends Component
{

    use HasAuthenticatedUser;
    
    public TenantForm $form; 

    public function render()
    {
        return view('.admin.settings.settings-basic-information');
    }
    
    public function mount()
    {   
        $this->form->setTenant($this->getTenant());
    }

    public function save() : void
    {

        $this->validate();

        $this->form->update();
        
        Toaster::success('Informações atualizadas com sucesso!');

    }
}
