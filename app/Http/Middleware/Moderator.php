<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Moderator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->check() || auth()->user()->status != 'moderator'){
            return redirect()->back()->with('message', '🚫 Jums nav moderatora tiesību, tāpēc pieeja šai lapai ir slēgta.');
        }

        return $next($request);
    }
}
