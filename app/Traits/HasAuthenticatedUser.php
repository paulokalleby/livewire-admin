<?php 

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait HasAuthenticatedUser 
{
    private function getUser(): User
    {
        return Auth::user();
    }

    private function getTenant()
    {
        return Auth::user()->tenant;
    }

    private function isLogged()
    {
        return Auth::check();
    }
}