<?php 

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

trait BuildableTenant
{
    public function unique($model)
    {
        return Rule::unique($model)->where(function ($query) {

            return $query->where('tenant_id', Auth::user()->tenant_id);
        
        });
    }
}