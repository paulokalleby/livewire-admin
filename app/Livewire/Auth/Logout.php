<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function render()
    {
        return view('auth.logout');
    }

    public function logout()
    {
        Auth::logout();

        $this->redirect( route('auth.login') );
    }   

}
