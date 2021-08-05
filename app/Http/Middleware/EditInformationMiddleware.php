<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EditInformationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request,Closure $next)
    {
        if ($request->user()->id % 2 != 0) {
            abort(403,'Your id is odd.');
        }

        return $next($request);
    }
}
