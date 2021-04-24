<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class corsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $response->headers->set('Access-Control-Expose-Headers','Content-Range','posts 0-24/319');
        $response->headers->set('Content-Range','posts 0-24/319');
        // dd($response);
        return $response;
    }
}
