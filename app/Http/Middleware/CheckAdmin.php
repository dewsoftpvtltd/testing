<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\RedirectResponse;
class CheckAdmin {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($user && $user->isAdmin())
        {  
           return $next($request);
        }
        //return new RedirectResponse(url('/'));
         return redirect(route('home'));
        
    }
}
