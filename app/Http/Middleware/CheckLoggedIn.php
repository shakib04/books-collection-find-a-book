<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLoggedIn
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
        if ($request->session()->has('email')) {
            return $next($request);
        } else {
            $request->session()->flash('notLogged', 'Kindly Log In to Access');
            return redirect('/login');
        }
    }
}
