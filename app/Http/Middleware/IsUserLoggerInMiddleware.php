<?php

namespace App\Http\Middleware;

use Closure;

class IsUserLoggerInMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->has('logged')) {
            throw new \Exception('User не залогинен');
        }

        return $next($request);
    }
}
