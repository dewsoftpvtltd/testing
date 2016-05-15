<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\School;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Entities\User;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name="grades")
 * @ORM\HasLifecycleCallbacks
 */
class Grade
{ 
    use Timestamps, SoftDeletes;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;
    /**
     * @ORM\Column(type="string")
     */
    protected $session;
    

    /**
    * @ORM\ManyToOne(targetEntity="School", inversedBy="grades", cascade={"persist"})
    */
    protected $school;
   /**
    * @ORM\OneToMany(targetEntity="Section", mappedBy="grade", cascade={"persist"})
    * @var ArrayCollection|Section[]
    */
    protected $sections; 
    /**
    * @ORM\OneToMany(targetEntity="Subject", mappedBy="grade", cascade={"persist"})
    * @var ArrayCollection|Subject[]
    */
    protected $subjects;
    /**
    * @ORM\OneToMany(targetEntity="Student", mappedBy="grade", cascade={"persist"})
    * @var ArrayCollection|Student[]
    */
    protected $students;
     /**
    * @ORM\OneToMany(targetEntity="Period", mappedBy="grade", cascade={"persist"})
    * @var ArrayCollection|Period[]
    */
    protected $periods;
      /**
    * @ORM\OneToMany(targetEntity="Examination", mappedBy="grade", cascade={"persist"})
    * @var ArrayCollection|Examination[]
    */
    protected $examinations;
      /**
    * @ORM\OneToMany(targetEntity="Fee", mappedBy="grade", cascade={"persist"})
    * @var ArrayCollection|Fee[]
    */
    protected $fees;
   
    /**
    * @param $name
    */
    public function __construct($name,$session, School $school)
    {
        $this->name = $name;
        $this->session = $session;
        $this->school = $school;
        $this->sections = new ArrayCollection;
        $this->subjects = new ArrayCollection;
        $this->students = new ArrayCollection;
        $this->periods = new ArrayCollection;
        $this->examinations = new ArrayCollection;
        $this->fees = new ArrayCollection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
     public function getSession()
    {
        return $this->session;
    }
   
   
     public function setSession($session)
    {
       $this->session = $session;
    }

    public function setSchool(School $school)
    {
        $this->school = $school;
    }

    public function getSchool()
    {
        return $this->school;
    }
     public function getSection()
    {
        return $this->$sections;
    }
     public function getStudents()
    {
        return $this->students;
    }
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
      public function getPeriods()
    {
        return $this->periods;
    }
     public function getExaminations()
    {
        return $this->examinations;
    }
     public function getFees()
    {
        return $this->fees;
    }
}