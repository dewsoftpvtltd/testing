<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use LaravelDoctrine\ACL\Contracts\Organisation;
use LaravelDoctrine\ACL\Mappings as ACL;
use App\Domain\Entities\User;
use App\Domain\ValueObjects\Name;
use App\Domain\Entities\Building;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
use LaravelDoctrine\ACL\Contracts\BelongsToOrganisations;
/**
 * @ORM\Entity
 * @ORM\Table(name="schools")
 */
class School implements Organisation
{ 
    use Timestamps, SoftDeletes;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
  /**
     * The name value object which holds the
     * first, middle, additional and last name of the school
     * @ORM\Embedded(class="App\Domain\ValueObjects\Name", columnPrefix=false)
     *
     * @var Name
     */
    protected $name;
       /**
     * @ORM\Column(type="string")
     * @var Branch
     */
    protected $branch;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="organisations", cascade={"persist"})
     * @var ArrayCollection|User[]
     */
    protected $users;

    /**
    * @ORM\OneToMany(targetEntity="Building", mappedBy="school", cascade={"persist"})
    * @var ArrayCollection|Building[]
    */
    protected $buildings;
    /**
    * @ORM\OneToMany(targetEntity="Ground", mappedBy="school", cascade={"persist"})
    * @var ArrayCollection|Ground[]
    */
    protected $grounds;
    /**
    * @ORM\OneToMany(targetEntity="Contact", mappedBy="school", cascade={"persist"})
    * @var ArrayCollection|Contact[]
    */
    protected $contacts;
    /**
    * @ORM\OneToMany(targetEntity="Grade", mappedBy="school", cascade={"persist"})
    * @var ArrayCollection|Grade[]
    */
    protected $grades;
     /**
    * @ORM\OneToMany(targetEntity="Teacher", mappedBy="school", cascade={"persist"})
    * @var ArrayCollection|Teacher[]
    */
    protected $teachers;
     /**
    * @ORM\OneToMany(targetEntity="SchoolAdmin", mappedBy="school", cascade={"persist"})
    * @var ArrayCollection|SchoolAdmin[]
    */
    protected $schooladmins;
    /**
    * @ORM\OneToMany(targetEntity="Student", mappedBy="school", cascade={"persist"})
    * @var ArrayCollection|Student[]
    */
    protected $students;
      /**
    * @ORM\OneToMany(targetEntity="Period", mappedBy="school", cascade={"persist"})
    * @var ArrayCollection|Period[]
    */
    protected $periods;
      /**
    * @ORM\OneToMany(targetEntity="Examination", mappedBy="school", cascade={"persist"})
    * @var ArrayCollection|Examination[]
    */
    protected $examinations;
      /**
    * @ORM\OneToMany(targetEntity="Course", mappedBy="school", cascade={"persist"})
    * @var ArrayCollection|Course[]
    */
    protected $courses;
      /**
    * @ORM\OneToMany(targetEntity="Prospectus", mappedBy="school", cascade={"persist"})
    * @var ArrayCollection|Prospectus[]
    */
    protected $prospectus;
      /**
    * @ORM\OneToMany(targetEntity="Fee", mappedBy="school", cascade={"persist"})
    * @var ArrayCollection|Fee[]
    */
    protected $fees;
      /**
    * @ORM\OneToMany(targetEntity="Duty", mappedBy="school", cascade={"persist"})
    * @var ArrayCollection|Duty[]
    */
    protected $duties;
      /**
    * @ORM\OneToMany(targetEntity="NoticeBoard", mappedBy="school", cascade={"persist"})
    * @var ArrayCollection|NoticeBoard[]
    */
    protected $notices;
    /**
    * @ORM\OneToMany(targetEntity="SchoolAddress", mappedBy="school", cascade={"persist"})
    * @var ArrayCollection|BuildingAddress[]
    */
    protected $schooladdresses;
    /**
    * @ORM\ManyToOne(targetEntity="Package", inversedBy="schools", cascade={"persist"})
    */
    protected $package;
    /**
    * @ORM\OneToMany(targetEntity="PaymentRecord", mappedBy="school", cascade={"persist"})
    * @var ArrayCollection|PaymentRecord[]
    */
    protected $paymentrecords;
    /**
    * @param $name
    */
    public function __construct(Name $name, $branch)
    {
        $this->name = $name;
        $this->users = new ArrayCollection;
        $this->buildings = new ArrayCollection;
        $this->grounds = new ArrayCollection;
        $this->contacts = new ArrayCollection;
        $this->grades = new ArrayCollection;
        $this->teachers = new ArrayCollection;
        $this->students = new ArrayCollection;
        $this->periods = new ArrayCollection;
        $this->examinations = new ArrayCollection;
        $this->schooladmins = new ArrayCollection;
        $this->courses = new ArrayCollection;
        $this->prospectus = new ArrayCollection;
        $this->fees = new ArrayCollection;
        $this->duties = new ArrayCollection;
        $this->notices = new ArrayCollection;
        $this->schooladdresses = new ArrayCollection;
        $this->paymentrecords = new ArrayCollection;
        //$this->package = $package;
        $this->branch = $branch;
    }

    public function getId()
    {
        return $this->id;
    }
     /**
     * @return string
     */
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
    public function setBuilding(Building $building)
    {
        $this->$buildings= $building;
    }
    public function getBuilding()
    {
        if(!$this->buildings){
            return 'No buildings added yet.';
        }else{
          return $this->$buildings; 
        } 
    }
     public function getGround()
    {
        return $this->$grounds;
    }
      public function getContact()
    {
        return $this->$contacts;
    }
      public function getGrade()
    {
        return $this->$grades;
    }
     public function getTeachers()
    {
        return $this->teachers;
    }
     public function getSchoolAdmins()
    {
        return $this->schooladmins;
    }
     public function getStudents()
    {
        return $this->students;
    }
     public function getPeriods()
    {
        return $this->periods;
    }
     public function getExaminations()
    {
        return $this->examinations;
    }
    public function setUser(User $user)
    {
        $this->users[] = $user;
    }

    public function getUser()
    {
        return $this->users;
    }
      public function getCourse()
    {
        return $this->courses;
    }
       public function getProspectus()
    {
        return $this->prospectus;
    }
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
       public function getFees()
    {
        return $this->fees;
    }
     public function getDuties()
    {
        return $this->duties;
    }
     public function getNotices()
    {
        return $this->notices;
    }
    public function getSchoolAddress()
    {
        return $this->schooladdresses;
    }
    public function getPackage()
    {
        return $this->package;
    }
    
    public function setPackage(Package $package)
    {
         $this->package = $package;
    }
    public function getBranch()
    {
        return $this->branch;
    }
    public function getPaymentRecords()
    {
        return $this->paymentrecords;
    }
}