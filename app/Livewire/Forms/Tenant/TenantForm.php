<?php

namespace App\Livewire\Forms\Tenant;

use App\Models\Tenant;
use Livewire\Form;

class TenantForm extends Form
{
    public ?Tenant $tenant;

    public $uuid;
    public $name;

    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:50'
            ],
        ];
    }

    public function setTenant(Tenant $tenant)
    {
        $this->tenant = $tenant;
        $this->name   = $tenant->name;
    }

    public function update()
    {        
        $this->tenant->update($this->all());
    }
}

