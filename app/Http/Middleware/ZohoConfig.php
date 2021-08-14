<?php

namespace App\Http\Middleware;

use Closure;

class ZohoConfig
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
        if (!$request->session()->has('configuration'))
            return redirect(route('zoho_config'));
        return $next($request);
    }
}
