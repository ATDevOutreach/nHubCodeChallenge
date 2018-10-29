<?php

namespace App\Http\Middleware;

use Closure;

class ReferrerMiddleware
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
        if($request->has('ref_id')) {
            Cookie::queue('ref_id', $request->get('ref_id'), 43200); // 43200 in minutes are 30 days
        }
        
        return $next($request);
    }
}
