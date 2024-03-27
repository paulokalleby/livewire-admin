<?php

namespace App\Livewire\Admin\Roles;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Masmerise\Toaster\Toaster;

class RolesIndex extends Component
{
    use WithPagination;

    public $name   = '';
    public $status = '';
    public $pages  = 8;

    public function resetFilters()
    {
        $this->reset();
    }

    public function updating()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('admin.roles.roles-index')->with([
            'roles' => Role::with('users', 'permissions')
                ->where('name', 'like', '%' . $this->name . '%')
                ->where('active', 'like', '%' . $this->status . '%')
                ->orderBy('name', 'ASC')
                ->paginate($this->pages),
        ]);
    }

    public function delete(Role $role) : void
    {
        Toaster::success('Papel excluido com sucesso!');

        $role->permissions()->detach();
        $role->delete();
    }
}
