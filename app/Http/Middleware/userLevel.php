<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class userLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->setLevel == 1){
            return $next($request);
        }
        else{
            return redirect('/welcome')->withStatus("You don't have admin access.");
        }
    }
}
