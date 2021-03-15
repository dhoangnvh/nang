<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckSuperUser
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
        if(Auth::user()->is_superuser === 1){
            return $next($request);
        }else{
            return redirect()->back()->with('error','Ban khong co quyen');
        }
    }
}
