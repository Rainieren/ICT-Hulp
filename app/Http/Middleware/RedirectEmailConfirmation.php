<?php

namespace App\Http\Middleware;

use Closure;

class RedirectEmailConfirmation
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
        if(! $request->user()->confirmed)
        {
            return redirect('/')->with('flash', 'Helaas, Je moet eerst je email verifieren.');
        }

        return $next($request);
    }
}
