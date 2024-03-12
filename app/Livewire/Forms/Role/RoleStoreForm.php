<?php

namespace App\Livewire\Forms\Role;

use App\Models\Role;
use Livewire\Form;

class RoleStoreForm extends Form
{
    public $uuid;
    public $name;
    public $active = true;
    public $permission = [];

    public function rules()
    {
        return [
            'name'     => [
                'required', 
                'string', 
                'max:50'
            ],
            'active'  => [
                'nullable', 
                'boolean'
            ],
            'permission'    => [
                'nullable', 
            ],
        ];
    }

    public function store()
    {
        $this->validate();
 
        $role = Role::create($this->all());

        $role->permissions()->attach(array_keys($this->permission));
 
        $this->reset(); 
    }
}
