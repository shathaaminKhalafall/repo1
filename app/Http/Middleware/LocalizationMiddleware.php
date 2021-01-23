<?php

namespace App\Http\Middleware;

use Closure;

class LocalizationMiddleware
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
        if (session()->has('locale'))
            if ($request->segment(1) == 'admin')
                app()->setlocale('en');
            else
                app()->setlocale(session()->get('locale'));


        return $next($request);
    }
}
