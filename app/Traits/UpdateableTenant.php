<?php 

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

trait UpdateableTenant
{
    public function unique($model, $id)
    {
        return Rule::unique($model)->ignore($id)->where(function ($query) {

            return $query->where('tenant_id', Auth::user()->tenant_id);
        
        });
    }
}