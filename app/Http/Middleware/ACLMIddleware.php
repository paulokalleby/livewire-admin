<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class ACLMIddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ( $request->user()->isSuperAdmin() ) return $next($request);

        if ( $request->user()->permissions()->contains( Route::currentRouteName() ) ) return $next($request);
       
        return abort(403, __('messages.not_authorized'));
    }
}
