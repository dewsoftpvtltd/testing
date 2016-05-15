<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\Section;
use App\Domain\Entities\Grade;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Entities\User;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name="sections")
 * @ORM\HasLifecycleCallbacks
 */
class Section
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
    * @ORM\ManyToOne(targetEntity="Grade", inversedBy="sections", cascade={"persist"})
    */
    protected $grade;
    /**
    * @ORM\ManyToMany(targetEntity="Teacher", inversedBy="sectionsallotted", cascade={"persist"})
    */
    protected $teachers;
   /**
    * @ORM\OneToMany(targetEntity="Student", mappedBy="section", cascade={"persist"})
    * @var ArrayCollection|Student[]
    */
    protected $students;
    /**
    * @ORM\OneToMany(targetEntity="Period", mappedBy="section", cascade={"persist"})
    * @var ArrayCollection|Period[]
    */
    protected $periods;
      /**
    * @ORM\OneToMany(targetEntity="Examination", mappedBy="section", cascade={"persist"})
    * @var ArrayCollection|Examination[]
    */
    protected $examinations;
      /**
    * @ORM\OneToMany(targetEntity="SectionStudent", mappedBy="section", cascade={"persist"})
    * @var ArrayCollection|SectionStudent[]
    */
    protected $sectionstudents;
     /**
    * @ORM\OneToMany(targetEntity="Homework", mappedBy="section", cascade={"persist"})
    * @var ArrayCollection|Homework[]
    */
    protected $homeworks;
    /**
    * @param $name
    */
    public function __construct($name, Grade $grade, Section $section )
    {
        $this->name = $name;
        $this->grade = $grade;
        $this->section = $section;
        $this->teachers = new ArrayCollection;
        $this->students = new ArrayCollection;
        $this->periods = new ArrayCollection;
        $this->examinations = new ArrayCollection;
        $this->sectionstudents = new ArrayCollection;
        $this->homeworks = new ArrayCollection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setGrade(Grade $grade)
    {
        $this->grade = $grade;
    }

    public function getGrade()
    {
        return $this->grade;
    }
     public function getSection()
    {
        return $this->section;
    }
     public function getTeachers()
    {
        return $this->teachers;
    }
     public function getStudents()
    {
        return $this->students;
    }
    public function setSection(Section $section)
    {
        $this->section = $section;
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
    public function getSectionStudents()
    {
        return $this->sectionstudents;
    }
    public function getHomeWork()
    {
        return $this->homeworks;
    }
}