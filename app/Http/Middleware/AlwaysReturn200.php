<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class AlwaysReturn200
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

        Log::info('Request Headers:', $request->header());
        $response = $next($request);

        // Check if the request comes from Facebook's crawler
        if (str_contains($request->header('User-Agent'), 'facebookexternalhit')) {
            // Change status code to 200
            Log::info('From facebook !');
            $response->setStatusCode(Response::HTTP_OK);
        }

        return $response;
    }
}
