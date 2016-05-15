<?php 
namespace App\Traits;
use App\Domain\Entities\User;
use App\Domain\Repositories\SchoolRepository as Schools;
use App\Domain\Repositories\PackageRepository as Packages;
use App\Domain\Repositories\PaymentRecordRepository as Payments;
use Auth;

trait MiddlewareTrait {
 
  /*
|--------------------------------------------------------------------------
| public Methods for Middleware , schoolhaspaidregistration,
|--------------------------------------------------------------------------
|
*/
    public function paymentsByUser(User $user){
       $count = $user->getPaymentRecords()->count();
       $payments = [];
       if($count){
        foreach($user->getPaymentRecords() as $p){
            $payments[] = $p->getSchool()->getId();
        }
    }
       return collect($payments); 
    }
    public function paymentType($schoolid,User $user, Schools $schools, Packages $packages, Payments $payments){
        
         $user = Auth::user();
        $school = $this->schools->find($schoolid);
        $schoolpackage = $school->getPackage();
        if($schoolpackage){
          $package = $this->packages->find($schoolpackage);
        $payment = $payments->findPaymentType($user,$school,$package);

        $d =  collect($payment)->first();
        $d = $d['type'];
        return $d;
      }else{
        return null;
      }
    } 
    
 
}