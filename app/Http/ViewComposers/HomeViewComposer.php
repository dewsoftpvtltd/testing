<?php 
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

use App\Domain\Entities\School;

use App\Domain\Entities\User;
use App\Domain\Entities\Role;
use App\Domain\Entities\Permission;

use App\Domain\Repositories\UserRepository;
use App\Domain\Repositories\UserContactRepository;
use App\Domain\Repositories\WorkHistoryRepository;
use App\Domain\Repositories\InterestRepository;
use App\Domain\Repositories\MedicalIssueRepository;
use App\Domain\Repositories\FamilyRepository;
use App\Domain\Repositories\AddressRepository;
use App\Domain\Repositories\OrganisationRepository;
use App\Domain\Repositories\RoleRepository;
use App\Domain\Repositories\PermissionRepository;
use Doctrine\ORM\EntityManagerInterface;
use LaravelDoctrine\ACL\Permissions\PermissionManager as PM;
use LaravelDoctrine\ACL\Contracts\Organisation;
use Auth;

class HomeViewComposer {

    protected $users;
    protected $contacts;
    protected $experience;
    protected $interests;
    protected $medicalissues;
    protected $family;
    protected $addrress;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $users,
        UserContactRepository $contacts,
        WorkHistoryRepository $experience,
         InterestRepository $interests,
         MedicalIssueRepository $medicalissues,
        FamilyRepository $family,
         AddressRepository $address)
    {
        $this->users = $users;
        $this->contacts = $contacts;
        $this->experience = $experience;
        $this->medicalissues = $medicalissues;
        $this->family = $family;
        $this->address = $address;
        $this->interests = $interests;
    }

    public function compose(View $view) {
        if(Auth::user()){
        $user = $this->users->find(Auth::user()->getId());
        $contacts = $this->contacts->userAll($user);
        $experience = $this->experience->userAll($user);
        $interests = $this->interests->userAll($user);//dd($experience);
        $medicalissues = $this->medicalissues->userAll($user);
        $family = $this->family->userFamily($user);//dd($family);
        $address = $this->address->userAll($user);//dd($address);

        $view->with("user", $user);
        $view->with("contacts", $contacts);
        $view->with("experience", $experience);
        $view->with("interests", $interests);
        $view->with("medicalissues", $medicalissues);
        $view->with("family", $family);
        $view->with("address", $address);
        
        }
    }
}