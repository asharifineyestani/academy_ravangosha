<?php

namespace App\Http\Middleware;

use App\Models\Statistic;
use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TrackMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }

    public function terminate($request, $response)
    {
        if(Auth::user() && Auth::id() == 2)
            return null;

        Statistic::create([
            'uri' => $request->getUri(),
            'method' => $request->getMethod(),
            'status_code' => $response->getStatusCode(),
            'ip' => \Request::ip(),
            'session_id' => Session::getId() ?? null,
            'user_id' => Auth::id() ?? null,
            'server' => $request->server() ?? null,
            'input' => $request->input() ?? null,
            'path' => $request->server()['PATH_INFO'] ?? '',
            'referer' => $request->server()['HTTP_REFERER'] ?? '',
            'browser' => $request->server()['HTTP_SEC_CH_UA'] ?? '',
            'platform' => $request->server()['HTTP_SEC_CH_UA_PLATFORM'] ?? '',

            'created_at' => Carbon::now(),
        ]);


    }
}
