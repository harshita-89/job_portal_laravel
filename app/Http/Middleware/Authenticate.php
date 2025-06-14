<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * This method is crucial for handling redirects when an unauthenticated user
     * attempts to access a protected route (e.g., those using the 'auth' middleware).
     * By default, Laravel looks for a route named 'login'.
     *
     * Since your login route is named 'account.login', we must
     * update this method to reflect that name.
     */
    protected function redirectTo(Request $request): ?string
    {
        // If the request expects a JSON response (e.g., an AJAX call),
        // we return null to indicate no redirect is needed.
        // Otherwise, we redirect to the appropriate login route.
        return $request->expectsJson() ? null : route('account.login');
    }
}
