<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

    // Add new method
    protected function unauthenticated($request, array $guards)
    {
        abort(response()->json(
            [
                'success' => false,
                'message' => 'UnAuthenticated',
            ], 401));
    }

}
