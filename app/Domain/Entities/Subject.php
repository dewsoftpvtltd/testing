<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\SubjectName;
use App\Domain\Entities\Syllabus;
use App\Domain\Entities\Grade;
use App\Domain\Entities\Teacher;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name="subjects")
 * @ORM\HasLifecycleCallbacks
 */
class Subject
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
    protected $recommendedBooks;
    /**
     * @ORM\Column(type="string")
     */
    protected $writtenBy;
    
   /**
    * @ORM\ManyToOne(targetEntity="Grade", inversedBy="subjects", cascade={"persist"})
    * @var ArrayCollection|Grade[]
    */
    protected $grade; 
    /**
    * @ORM\ManyToOne(targetEntity="SubjectName", inversedBy="subjects", cascade={"persist"})
    * @var ArrayCollection|SubjectName[]
    */
    protected $subjectName;
   /**
    * @ORM\ManyToOne(targetEntity="Teacher", inversedBy="subjectsallotted", cascade={"persist"})
    */
    protected $teacher;
     /**
    * @ORM\OneToMany(targetEntity="Period", mappedBy="subject", cascade={"persist"})
    * @var ArrayCollection|Period[]
    */
    protected $periods;
      /**
    * @ORM\OneToMany(targetEntity="Examination", mappedBy="subject", cascade={"persist"})
    * @var ArrayCollection|Examination[]
    */
    protected $examinations;
    /**
    * @ORM\OneToOne(targetEntity="Syllabus", inversedBy="subject", cascade={"persist"})
    */
    protected $syllabus;
     /**
    * @ORM\OneToMany(targetEntity="StudentSubject", mappedBy="subject", cascade={"persist"})
    * @var ArrayCollection|StudentSubject[]
    */
    protected $studentsubjects;
    /**
    * @param $recommendedBooks
    */
    public function __construct($recommendedBooks,$writtenBy,Grade $grade,SubjectName $subjectName, Syllabus $syllabus,Teacher $teacher)
    {
        $this->recommendedBooks = $recommendedBooks;
        $this->writtenBy = $writtenBy;   
        $this->teacher = $teacher; 
        $this->syllabus = $syllabus; 
        $this->periods = new ArrayCollection;
        $this->examinations = new ArrayCollection;
        $this->subjectName = new ArrayCollection;
        $this->grade = new ArrayCollection;
        $this->studentsubjects = new ArrayCollection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRecommendedBooks()
    {
        return $this->recommendedBooks;
    }
     public function getWrittenBy()
    {
        return $this->writtenBy;
    }
   
     public function getGrade()
    {
        return $this->$grade;
    }
     public function getTeacher()
    {
        return $this->$teacher;
    }
      public function getSyllabus()
    {
        return $this->$syllabus;
    }
     public function getSubjectName()
    {
        return $this->$subjectName;
    }
     public function getPeriods()
    {
        return $this->periods;
    }
     public function getExaminations()
    {
        return $this->examinations;
    }
    public function getStudentSubjects()
    {
        return $this->studentsubjects;
    }
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
}