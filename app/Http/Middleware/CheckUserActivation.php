<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserActivation
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
        $theUser = Auth::user();
        if( $theUser &&  $theUser->status=='inactive')
        {

            if (\Route::currentRouteName() != 'admin') {
                return redirect()->route('admin');
            }


        }
        return $next($request);

    }
}
