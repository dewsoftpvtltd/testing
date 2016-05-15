<?php
namespace App\Domain\Entities;

use Doctrine\ORM\Mapping AS ORM;
use LaravelDoctrine\ACL\Roles\HasRoles;
use LaravelDoctrine\ACL\Mappings as ACL;
use LaravelDoctrine\ACL\Contracts\HasRoles as HasRolesContract;
use App\Domain\ValueObjects\Name;
use App\Domain\ValueObjects\Email;
use App\Domain\Entities\School;
use App\Domain\Entities\Post;
use App\Domain\Entities\Permission;
use App\Domain\Entities\Role;
use App\Domain\Entities\SchoolAdmin;
use LaravelDoctrine\ORM\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Doctrine\Common\Collections\ArrayCollection;
use LaravelDoctrine\ACL\Permissions\HasPermissions;
use LaravelDoctrine\ACL\Contracts\HasPermissions as HasPermissionContract;
use LaravelDoctrine\ACL\Permissions\PermissionManager;
use LaravelDoctrine\ACL\Contracts\BelongsToOrganisations;
use LaravelDoctrine\ACL\Organisations\BelongsToOrganisation;
use Auth;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 * @ORM\HasLifecycleCallbacks
 */
class User implements AuthenticatableContract, CanResetPasswordContract, AuthorizableContract, HasRolesContract, HasPermissionContract, BelongsToOrganisations
{
    use Authenticatable, Timestamps, CanResetPassword, Authorizable, HasRoles, HasPermissions,BelongsToOrganisation;
    
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;
    /**
     * The name value object which holds the
     * first, middle, additional and last name of the user
     * @ORM\Embedded(class="App\Domain\ValueObjects\Name", columnPrefix=false)
     *
     * @var Name
     */
    protected $name;

    /**
    * @ORM\OneToMany(targetEntity="Post", mappedBy="user", cascade={"persist"})
    * @var ArrayCollection|Post[]
    */
    protected $posts;
   
     /**
     * @ACL\BelongsToOrganisations
     * @var Organisation[]
     */
    protected $organisations;

   

       /**
     * @ORM\Column(type="string")
     * @var Email
     */
    protected $email;

   /**
     * @ORM\Column(type="string")
     * @var Password
     */
    protected $password;

   /**
     * @ORM\Column(type="string")
     * @var Usertype
     */
    protected $usertype;
   /**
    * @ORM\ManyToOne(targetEntity="Country", inversedBy="users", cascade={"persist"})
    */
    protected $country;
    /**
     * @ORM\Column(type="smallint")
     * @var Gender
     */
    protected $gender;

    /**
     * @ORM\ManyToMany(targetEntity="Role", mappedBy="user", cascade={"persist"})
     * @var \Doctrine\Common\Collections\ArrayCollection|\LaravelDoctrine\ACL\Contracts\Role[]
     */
     protected $roles;

    
    /**
     * @ACL\HasPermissions()
     */
     public $permissions;

   /**
    * @ORM\OneToMany(targetEntity="Teacher", mappedBy="user", cascade={"persist"})
    * @var ArrayCollection|Teacher[]
    */
    protected $teachers;
       /**
    * @ORM\OneToMany(targetEntity="SchoolAdmin", mappedBy="user", cascade={"persist"})
    * @var ArrayCollection|SchoolAdmin[]
    */
    protected $schooladmins;
    /**
    * @ORM\OneToMany(targetEntity="Student", mappedBy="user", cascade={"persist"})
    * @var ArrayCollection|Student[]
    */
    protected $students;
      /**
    * @ORM\OneToMany(targetEntity="Duty", mappedBy="assignedto", cascade={"persist"})
    * @var ArrayCollection|Duty[]
    */
    protected $duties;
  /**
    * @ORM\OneToMany(targetEntity="Address", mappedBy="user", cascade={"persist"})
    * @var ArrayCollection|Address[]
    */
    protected $addresses;
    /**
    * @ORM\OneToMany(targetEntity="UserContact", mappedBy="user", cascade={"persist"})
    * @var ArrayCollection|UserContact[]
    */
    protected $usercontacts;
      /**
    * @ORM\OneToMany(targetEntity="MedicalIssue", mappedBy="user", cascade={"persist"})
    * @var ArrayCollection|MedicalIssue[]
    */
    protected $medicalissues;

      /**
    * @ORM\OneToMany(targetEntity="Interest", mappedBy="user", cascade={"persist"})
    * @var ArrayCollection|Interest[]
    */
    protected $interests;
      /**
    * @ORM\OneToMany(targetEntity="Family", mappedBy="familymember", cascade={"persist"})
    * @var ArrayCollection|Family[]
    */
    protected $family;
       /**
    * @ORM\OneToMany(targetEntity="Family", mappedBy="user", cascade={"persist"})
    * @var ArrayCollection|Family[]
    */
    protected $familyuser;
      /**
    * @ORM\OneToMany(targetEntity="WorkHistory", mappedBy="user", cascade={"persist"})
    * @var ArrayCollection|WorkHistory[]
    */
    protected $workhistories;
       /**
    * @ORM\OneToMany(targetEntity="UserPackage", mappedBy="user", cascade={"persist"})
    * @var ArrayCollection|UserPackage[]
    */
    protected $userpackages;
    /**
    * @ORM\OneToMany(targetEntity="PaymentRecord", mappedBy="user", cascade={"persist"})
    * @var ArrayCollection|PaymentRecord[]
    */
    protected $paymentrecords;
     /**
    * @ORM\OneToMany(targetEntity="TempSchool", mappedBy="user", cascade={"persist"})
    * @var ArrayCollection|TempSchool[]
    */
    protected $tempschools;
     /**
     * @param Name   $name
     * @param string $email
     */
    public function __construct(Name $name, $email,$password,$usertype,$gender=0,$country)
    {
        $this->email = $email;
        $this->name  = $name;
        $this->password = $password;
        $this->usertype = $usertype;
        $this->gender = $gender;
        $this->country = $country;
        $this->posts = new ArrayCollection;
        $this->organisations = new ArrayCollection;
        $this->roles = new ArrayCollection;
        $this->permissions = new ArrayCollection;
        $this->teachers = new ArrayCollection;
        $this->students = new ArrayCollection;
        $this->schooladmins = new ArrayCollection;
        $this->duties = new ArrayCollection;
        $this->addresses = new ArrayCollection;
        $this->usercontacts = new ArrayCollection;
        $this->medicalissues = new ArrayCollection;
        $this->interests = new ArrayCollection;
        $this->family = new ArrayCollection;
        $this->familyuser = new ArrayCollection;
        $this->workhistories = new ArrayCollection;
        $this->organisations = new ArrayCollection;
        $this->userpackages = new ArrayCollection;
        $this->paymentrecords = new ArrayCollection;
        $this->tempschools = new ArrayCollection;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Name
     */
    public function getName()
    { 
        if($this->name->getMiddlename() AND $this->name->getAdditionalname() AND $this->name->getExtraname()){
            return $this->name->getFirstname().' '.$this->name->getMiddlename().' '.$this->name->getAdditionalname().' '.$this->name->getLastname().' '.$this->name->getExtraname();
        }elseif($this->name->getMiddlename() AND $this->name->getAdditionalname()){
            return $this->name->getFirstname().' '.$this->name->getMiddlename().' '.$this->name->getLastname().' '.$this->name->getAdditionalname();
        }elseif($this->name->getMiddlename()){
            return $this->name->getFirstname().' '.$this->name->getMiddlename().' '.$this->name->getLastname();
        }else{
            return $this->name->getFirstname(). ' '.$this->name->getLastname();
        }
    }

    /**
     * @param Name $name
     */
    public function setName(Name $name)
    {
        $this->name = $name;
    }
     /**
     * @return Name
     */
    public function getUsertype()
    {
        return $this->usertype;
    }

    /**
     * @param string $type
     */
    public function setUsertype($type)
    {
        $this->usertype = $type;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    /**
     * @return string
     */
    // public function getSchools()
    // {
    //     return $this->schools;
    // }

    /**
     * @param string $schools
     */
    // public function setSchools($schools)
    // {
    //     $this->schools = $schools;
    // }
    public function getAuthIdentifierName()
    {
        $fname = $this->name->getFirstname();
        return $fname;
    
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getPassword()
    {
        return $this->password;
    }
     public function getRoles()
    {
        return $this->roles;
    }
     public function getPermissions()
    {
        return $this->permissions;
    }
     public function getTeachers()
    {
        return $this->teachers;
    }
       public function getStudents()
    {
        return $this->students;
    }
      /**
     * @return Organisation[]
     */
    public function getOrganisations()
    {
        return $this->organisations;
    }
    public function setOrganisations(School $school)
    {
        $this->organisations[] = $school;
    }
    /**
     * @return Role
     */
    public function isAdmin()
    {
        return $this->hasRoleByName(['user','admin'],true);
    }
    public function isOwner()
    {
        return $this->hasRoleByName(['user','owner'],true);
    }
     public function getSchoolAdmins()
    {
        return $this->schooladmins;
    }
     public function getDuties()
    {
        return $this->duties;
    }
     public function getAddress()
    {
        return $this->addresses;
    }
     public function getUserContact()
    {
        return $this->usercontacts;
    }
     public function getMedicalIssue()
    {
        return $this->medicalissues;
    }
     public function getInterests()
    {
        return $this->interests;
    }
     public function getFamily()
    {
        return $this->family;
    }
       public function getFamilyMember()
    {
        $members = $this->family;
        foreach($members as $member){
            return $member;
        }
    }
    public function getFamilyUser()
    {
        return $this->familyuser;
    }
    public function getGender()
    {
        return $this->gender;
    }
     public function getWorkHistory()
    {
        return $this->workhistories;
    }
     public function getUserPackages()
    {
        return $this->userpackages;
    }
    public function getPaymentRecords()
    {
        return $this->paymentrecords;
    }
     public function getTempSchools()
    {
        return $this->tempschools;
    }


}