<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class DashboardIndex extends Component
{
    public function render()
    {
        return view('admin.dashboard.dashboard-index')->with([
            'roles' => Role::count(),
            'users' => User::count(),
        ]);
    }
}
