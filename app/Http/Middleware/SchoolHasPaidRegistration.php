<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use App\Domain\Entities\User;
use App\Domain\Repositories\SchoolRepository as Schools;
use App\Domain\Repositories\PackageRepository as Packages;
use App\Domain\Repositories\PaymentRecordRepository as Payments;
use App\Traits\MiddlewareTrait;

class SchoolHasPaidRegistration
{
    use MiddlewareTrait;

    protected $schools;
    protected $packages;
    protected $payments;
    public function __construct(Schools $schools,Packages $packages, Payments $payments){
            $this->schools = $schools;
            $this->packages = $packages;
            $this->payments = $payments;
    }
   /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {  
        $schoolid = $request->segment(3);
        $user = Auth::user();
        
        
        if ($user && $this->paymentsByUser($user)->contains($schoolid) && 
            $this->paymentType($schoolid,$user,$this->schools,$this->packages,$this->payments)=='registration')
        {  
           return $next($request);
        }
        elseif($schoolid){
         return redirect(route('packages.medium',['school'=>$schoolid]));
        }else{
            return redirect(route('home'));
        }
        
    }

   
}
