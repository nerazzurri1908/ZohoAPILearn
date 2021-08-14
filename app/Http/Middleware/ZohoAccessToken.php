<?php

namespace App\Http\Middleware;

use Closure;
use zcrmsdk\crm\setup\restclient\ZCRMRestClient;
use zcrmsdk\crm\utility\ZCRMConfigUtil;

class ZohoAccessToken
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
        $token = "";
        try {
            $configuration = session('configuration');
            ZCRMRestClient::initialize($configuration);
            $token = ZCRMConfigUtil::getAccessToken();
        } finally {
            if (!$token) return redirect(route('tokken_not_found'));
            return $next($request);
        }
    }
}
