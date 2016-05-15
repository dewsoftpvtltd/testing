<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class hasPaid {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $school = $request->segment(3);
        $user = Auth::user();
        if ($user && $user->getPaymentRecords()->first())
        {  
           return $next($request);
        }
        elseif($school){
         return redirect(route('packages.medium',['school'=>$school]));
        }else{
            return redirect(route('home'));
        }
        
    }
}
