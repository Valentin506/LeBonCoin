<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
{
    if ($request->expectsJson()) {
        return null;
    }

    // Check the guard being used
    $guard = auth()->getDefaultDriver();

    // Redirect based on the guard
    switch ($guard) {
        case 'employe':
            return route('employe.dashboard');
        default:
            return route('login');
    }
}


    
}
