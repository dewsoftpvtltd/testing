<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class IsIndividual {
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
        if ($user && $user->getUserType()=='individual' )
        {  
             return $next($request);
         }elseif($user && $user->getUserType()=='school' ){
            return redirect(route('school.list'));
         }
        
            //return new RedirectResponse(route('/'));
         return redirect(route('home'));
        }
        
        
    
}
