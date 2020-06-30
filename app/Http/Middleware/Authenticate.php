<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponser;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    use ApiResponser;
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        return $this->errorResponse(__("auth.not_fund"),401) ;

        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
