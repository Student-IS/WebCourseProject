<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRight
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, string $right)
    {
        if (!Auth::user()->rights()->where('name', $right)->exists())
        {
            return redirect()->route('home');
        }

        return $next($request);
    }

//    public function redirectTo($request, string $right)
//    {
//        if (!Auth::user()->rights()->where('name', $right)->exists())
//        {
//            return route('home');
//        }
//    }
}
