<?php 
namespace App\Traits;

use App\Domain\Entities\School;
use App\Domain\Entities\Post;
use App\Domain\Entities\User;
use App\Domain\Entities\Package;
use App\Domain\ValueObjects\Name;
use App\Domain\Entities\Role;
use App\Domain\Entities\Building;
use App\Domain\Entities\PaymentRecord;
use App\Domain\Entities\Permission;
use App\Domain\Repositories\PostRepository;
use App\Domain\Repositories\SkoolumAccountRepository as Bank;
use App\Domain\Repositories\OrganisationRepository as Organisations;
use App\Domain\Repositories\PaymentRecordRepository as Payments;
use App\Domain\Repositories\SchoolAddressRepository;
use App\Domain\Repositories\BuildingAddressRepository;
use App\Domain\Repositories\ContactRepository;
use App\Domain\Repositories\RoleRepository;
use App\Domain\Repositories\BuildingRepository;
use App\Domain\Repositories\CourseRepository;
use App\Domain\Repositories\SchoolRepository as Schools;
use App\Domain\Repositories\PackageRepository as Packages;
use App\Domain\Repositories\StudentRepository as Students;
use App\Domain\Repositories\GradeRepository as Grades;
use App\Domain\Repositories\PermissionRepository;
use Doctrine\ORM\EntityManagerInterface;
use LaravelDoctrine\ACL\Contracts\BelongsToOrganisations;
use LaravelDoctrine\ACL\Organisations\BelongsToOrganisation;
use Illuminate\Http\Request;
use LaravelDoctrine\ACL\Contracts\Organisation;
use App\Http\Requests\AddSchoolRequest;
use App\Http\Requests\PaymentRequest;
use App\Http\Requests;
use EntityManager as EM;
use Auth;
use Carbon\Carbon;
use App\Exceptions\Handler;
use Illuminate\Support\Facades\Session;
use Validator;

trait SchoolPage {
 
  /*
|--------------------------------------------------------------------------
| public Methods for SchoolController
|--------------------------------------------------------------------------
|
*/
    public function schoolName(AddSchoolRequest $school){
        return new Name(
            $firstname = $school->get('fname'),
            $lastname = $school->get('lname'),
            $middlename = $school->get('mname'),
            $additionalname = $school->get('addname'),
            $extraname = $school->get('xname'));
    }

     public function schoolBranch(AddSchoolRequest $school){
        return  $school->get('branch');
    }

    public function packageChosen(Packages $packages, $id){
        return $packages->find($id);
    }

    public function packageRegistrationFee(Packages $packages, $id){
        return $this->packageChosen($packages, $id)->getRegistration();
    }

    public function user(){
        return Auth::user();
    }

     public function getSchoolsOfUser(Organisations $organisations)
    {
        $user = $this->user();
        return $organisations->hasSchools($user);
    }

     public function getSchoolById(Schools $schools,$id)
    {
        return $schools->find($id);
    }

    public function pickerToCarbon($date)
    {    
        $d = new Carbon($date);
        return $d->toFormattedDateString();
    }

      public function findBankDateAndConvertDoctrineArrayDateToCarbon(Bank $bank,$account,$amount)
    {
        $bd = collect($bank->findDate($account,$amount))->first();
        $bd = $bd['dateofdeposit'];
        if($bd){
        $bd = new Carbon($bd->format(DATE_ISO8601));//dd($bd);
        return $bd->toFormattedDateString();
        }
        
    }

    public function true()
    {    
        return 1;
    }
    public function false()
    {    
        return 0;
    }

    public function accountsMach($account,Bank $bank)
    {    
        
        return $bank->userAccount($account);
    }

     public function datesMach($date,$bankdate)
    {    
        return !! $date == $bankdate;
    }

     public function feeIsCorrect($amount,$package,Bank $bank)
    {    $bankamount = collect($bank->userAmount($amount))->first()->getFeeAmount();
        return !! $bankamount==$package->getRegistration();
    }

    public function assignRole(RoleRepository $roles, $roleName){
        $role = $roles->findRole($roleName);
        $role = collect($role)->first();
        $role->setUser($this->user());  //foreach($role->getUser() as $r){echo $r->getName();}
        EM::persist($role);
       
         try {
          EM::flush();//code causing exception to be thrown
        } catch(\Exception $e) {
          //return response(view('errors.roleused'), 404);;//exception handling
        }
    }
    public function assignRoles(RoleRepository $roles, Array $roleNames){
        foreach($roleNames as $roleName){
            $role = $roles->findRole($roleName);
            $role = collect($role)->first();
            $role->setUser($this->user());  //foreach($role->getUser() as $r){echo $r->getName();}
        EM::persist($role); 
                 try {
                  EM::flush();//code causing exception to be thrown
                } catch(\Exception $e) {
                      return $e;
                }
            }
        }
    public function paymentsByUser(User $user){
       $count = $user->getPaymentRecords()->count();
       $payments = [];
       if($count){
        foreach($user->getPaymentRecords() as $p){
            $payments[] = $p->getSchool()->getName();
        }
    }
       return collect($payments); 
    }

    public function paymentType($schoolid,User $user, Schools $schools, Packages $packages, Payments $payments){
        $user = Auth::user();
        $school = $schools->find($schoolid);
        $schoolpackage = $school->getPackage();
        $package = $packages->find($schoolpackage);
        $payment = $payments->findPaymentType($user,$school,$package);

        $d =  collect($payment)->first();
        $d = $d['type'];
        return $d;
    }    
     public function paymentsOfSchool($school,Payments $payments){
        $user = Auth::user();
        return $payments->findPaymentsByASchool($user->getId(),$school);
        
    } 
 
}