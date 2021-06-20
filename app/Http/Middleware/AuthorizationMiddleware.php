<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthorizationMiddleware
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
        if ($request->session()->has('userid')) {
            return $next($request);
        } else {
            $request->session()->flash('authorizationMsg', 'Kindly Login to Access the feature');
            return redirect('/book/user/login');
        }
    }
}
