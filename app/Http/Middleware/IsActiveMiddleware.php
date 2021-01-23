<?php

namespace App\Http\Middleware;

use Closure;

class IsActiveMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (auth()->check())
            if (!auth()->user()->is_active) {
                auth()->logout();
                session()->flash('activation', __('app.error_activation'));
            }
        return $next($request);
    }
}
