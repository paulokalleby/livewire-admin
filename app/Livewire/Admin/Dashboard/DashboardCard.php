<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;

class DashboardCard extends Component
{
    public $title = '';
    public $icon  = '';
    public $info  = '';
    
    public function render()
    {
        return view('.admin.dashboard.dashboard-card');
    }
}
