<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class SchoolMiddleware
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $school = Auth::user()->getUsertype();
        if ($school == 'school') {
          return redirect(route('school.list'));     
        }
        return $next($request);
        
    }

}
