<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\School;
use App\Domain\Entities\User;
use App\Domain\Entities\Subject;
use App\Domain\Entities\Section;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name="teachers")
 * @ORM\HasLifecycleCallbacks
 */
class Teacher 
{ 
    use Timestamps, SoftDeletes;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $designation;
    /**
     * @ORM\Column(type="string")
     */
    protected $schoolrole;

    /**
    * @ORM\ManyToOne(targetEntity="School", inversedBy="teachers", cascade={"persist"})
    */
    protected $school;
     /**
    * @ORM\ManyToOne(targetEntity="User", inversedBy="teachers", cascade={"persist"})
    */
    protected $user;
    /**
    * @ORM\OneToMany(targetEntity="Subject", mappedBy="teacher", cascade={"persist"})
    * @var ArrayCollection|Subject[]
    */
    protected $subjectsallotted;
   /**
    * @ORM\ManyToMany(targetEntity="Section", mappedBy="teachers", cascade={"persist"})
    * @var ArrayCollection|Section[]
    */
    protected $sectionsallotted;
    /**
    * @ORM\OneToMany(targetEntity="Student", mappedBy="incharge", cascade={"persist"})
    * @var ArrayCollection|Student[]
    */
    protected $students;
     /**
    * @ORM\OneToMany(targetEntity="Period", mappedBy="teacher", cascade={"persist"})
    * @var ArrayCollection|Period[]
    */
    protected $periods;
      /**
    * @ORM\OneToMany(targetEntity="Examination", mappedBy="teacher", cascade={"persist"})
    * @var ArrayCollection|Examination[]
    */
    protected $examinations;
    /**
    * @ORM\OneToMany(targetEntity="CourseTeacher", mappedBy="teacher", cascade={"persist"})
    * @var ArrayCollection|CourseTeacher[]
    */
    protected $courseteachers;
    /**
    * @param $title
    */
    public function __construct($designation,$schoolrole,School $school, User $user, Subject $subjectsallotted, Section $sectionsallotted)
    {
        $this->designation = $designation;
        $this->schoolrole = $schoolrole;
        $this->school = $school;
        $this->user = $user;
        $this->subjectsallotted = new ArrayCollection;
        $this->sectionsallotted = new ArrayCollection;
        $this->periods = new ArrayCollection;
        $this->examinations = new ArrayCollection;
        $this->courseteachers = new ArrayCollection;
        
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDesignation()
    {
        return $this->designation;
    }
     public function getSchoolrole()
    {
        return $this->schoolrole;
    }
   
     public function setSchoolrole($schoolrole)
    {
       $this->schoolrole = $schoolrole;
    }

    public function setSchool(School $school)
    {
        $this->school = $school;
    }

    public function getSchool()
    {
        return $this->school;
    }
     public function getStudents()
    {
        return $this->students;
    }
    public function getSubjectsAllotted()
    {
        return $this->subjectsallotted;
    }
     public function getSectionsAllotted()
    {
        return $this->sectionsallotted;
    }
     public function getExaminations()
    {
        return $this->examinations;
    }
    public function setUser(User $user)
    {
        $this->users[] = $user;
    }
    public function getPeriods()
    {
        return $this->periods;
    }
    public function getUser()
    {
        return $this->user;
    }
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
     public function getCourseTeacher()
    {
        return $this->courseteachers;
    }
}