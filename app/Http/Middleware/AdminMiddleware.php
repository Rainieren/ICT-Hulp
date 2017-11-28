<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class adminMiddleware
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
        $allowed_role_ids = [2];

        if (!in_array($request->user()->role_id, $allowed_role_ids))
        {
            return redirect('/')->with('flash', 'U heeft hier geen toegang voor');
        } elseif(Auth::guest()) {

            return redirect('/')->with('flash', 'U bent een gast, U heeft hier geen toegang voor');
        }

        return $next($request);
    }
}
