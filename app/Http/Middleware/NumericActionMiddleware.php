<?php

namespace App\Http\Middleware;

use Closure;

class NumericActionMiddleware
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
        if (!is_numeric($request->route()->parameter('id'))) {
            throw new \Exception('Action must be numeric');
        }

        return $next($request);
    }
}
