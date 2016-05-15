<?php

namespace App\Http\Controllers;

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
use App\Domain\Repositories\PaymentRecordRepository as Payments;
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
use App\Traits\SchoolPage;

class SchoolController extends Controller
{
    use SchoolPage;

    /**
     * Show the school list belonging to a userType 'school'; which are owned by this user
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Organisations $organisations,Payments $payments)
    {
        //get the schools which are related to a user of school type
        $schools = $this->getSchoolsOfUser($organisations);
        
        //$t = collect($payments->findPaymentDate(2,4,2))->first();dd($t['date']);
        //$p = $this->paymentsByUser(Auth::user()); dd($p);
        //return the view which lists all the schools, where payments were made and packages were set
        return view('schoolviews.schoollist',[
            'user'=>$this->user(),
            'schools'=>$schools
            ]);
    }


    /**
     * Pay the skoolum fee
     */
    public function payment(
        $packageid,
        $school,
        Packages $packages,
        Schools $schools){
        //get the package chosen by the client
        $package = $this->packageChosen($packages, $packageid);

        //get the particular school for which a package was chosen
        $school =$this->getSchoolById($schools,$school);

        //get the registration fee for the package
        $registrationFee = $this->packageRegistrationFee($packages,$packageid);

        return view('feepayment',[
            'registrationFee'=>$registrationFee,
            'packageid'=>$packageid,
            'school'=>$school
            ]);
    }
     public function postPayment(
        PaymentRequest $payment,
         Bank $bank,
         Packages $packages,
         RoleRepository $roles,
         Schools $schools,
         Organisations $organisations){
       
       $user = $this->user();//dd($user->getPaymentRecords()->first()->getAccountedFor());

       //get all the fields in the Payment payment after validation through PaymentRequest
       $account = $payment->get('account');
       $amount = $payment->get('amount');
       $schoolid = $payment->get('schoolid');
       $date = $payment->get('date');
       $packageid = $payment->get('packageid');

       //get the package chosen by the client
        $package = $this->packageChosen($packages, $packageid);

       //get the particular school for which a package was chosen
        $school =$this->getSchoolById($schools,$schoolid);

        //hard code the type of skoolum fee
       $type = 'registration';

       //convert the date from datepicker on for to a carbon date and then get a string of formatted date
       $date = $this->pickerToCarbon($date);
       $bankdate = $this->findBankDateAndConvertDoctrineArrayDateToCarbon($bank,$account,$amount);
    
       //set to true
       $accountedfor = $this->true();
       
       //set the package in the school class
       $school->setPackage($package);

       //Check the payment credentials made by the client
       if($this->accountsMach($account,$bank) AND 
        $this->feeIsCorrect($amount,$package,$bank) AND 
        $this->datesMach($date,$bankdate))
       { 
       $paymentrecord = New PaymentRecord($account,$amount,$type,$date,$accountedfor,$user,$package,$school);
       
       EM::persist($paymentrecord);
       try {
          EM::flush();//code causing exception to be thrown
        } catch(\Exception $e) {
          return response(view('errors.paymenteffectgiven'), 404);;//exception handling
        }
      
      //assign owner role
        $this->assignRoles($roles, ['owner','generalmanager','admin','headofaccounts']);
      
      //get the schools which are related to a user of school type
        $schools = $this->getSchoolsOfUser($organisations);
        
        //dd($address->userAddress()); failure due to method call on array Try to loop through to apply methods
        return view('schoolviews.schoollist',[
            'user'=>$user,
            'schools'=>$schools
            ]);
 
        }else{
            return view('errors.paymentnotconfirmed');
        }


    }
    public function paymentsMade($school){
            return view('schoolviews.schoolpayments',['school'=>$school]);
    }
    /**
     * Add a school
     */
    public function add(){
        return view('schoolviews.addschool');
    }

     public function postAdd(AddSchoolRequest $school){
        
        $name = $this->schoolName($school);
        $user = $this->user();
        $branch = $this->schoolBranch($school);// dd($branch);
        $school = new School($name,$branch);//dd($school);
        
        //set school of user
        $user->setOrganisations($school);
        
        EM::persist($school);
        EM::flush();

        return redirect(route('packages.medium'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(
        $school,
        Organisations $organisations,
        SchoolAddressRepository $address,
        BuildingRepository $buildings,
        BuildingAddressRepository $buildingaddresses,
        ContactRepository $contacts,
        CourseRepository $courses,
        Students $students,
        Schools $schools,
        Grades $grades)
    {
        $user = $this->user();
         //get the particular school for which a package was chosen
        $school = $this->getSchoolById($schools,$school);
        
        $address = $address->userAll($school);//dd($address);
        $buildings = $buildings->userAll($school);
        $buildingaddress = $buildingaddresses->userAll($buildings);
        $contacts = $contacts->userAll($school);
        $courses = $courses->userAll($school);
        $students = $students->StudentsInSchool($school);
        $grades = $grades->userAll($school);
        //dd($address->userAddress()); failure due to method call on array Try to loop through to apply methods
        return view('schoolviews.schoolpage',[
            'user'=>$user,
            'school'=>$school,
            'address'=>$address,
            'buildings'=>$buildings,
            'buildingaddress'=>$buildingaddress,
            'contacts'=>$contacts,
            'courses'=>$courses,
            'students'=>$students,
            'grades'=>$grades
            ]);
    }

    public function show(Organisations $organisations) {
    $errors = [];
    $user=$this->user();

    //get the schools which are related to a user of school type
    $schools = $this->getSchoolsOfUser($organisations);
    

    //dd($user->isAdmin());
    //$blng = $user->belongsToOrganisation(['Cathedral','Central Model']);//dd($blng);
    return view('userviews.yourSchool', [
        'schools' => $schools,
        'user'=>$user,
       

         ]);
    }
    public function students(Students $students, $school) {
        $errors = [];
        
        
        dd($students->hasStudents($school));
        return view('userviews.studentInSchool', [
        'students' => $students,
        'errors'=>$errors
        ]);
        } 


    
}
