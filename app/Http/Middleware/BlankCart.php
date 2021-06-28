<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;

class BlankCart
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
        $userid = $request->session()->get('userid');
        $totalItemInCart = DB::table('shopping_cart')->where('UserId', $userid)->get();
        //return dd($totalItemInCart);
        if (count($totalItemInCart) == 0) {
            return redirect('/user/blankcart');
        } else {
            //$request->session()->flash('cartBlank', 'Your Cart is Empty! Add Book In Your Cart');
            return $next($request);
        }
    }
}
