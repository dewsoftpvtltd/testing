<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\School;
use App\Domain\Entities\User;
use App\Domain\Entities\Teacher;
use App\Domain\Entities\Section;
use App\Domain\Entities\Attendance;
use App\Domain\Entities\ExamAttendance;
use App\Domain\Entities\Grade;
use App\Domain\Entities\StudentSubject;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name="students")
 * @ORM\HasLifecycleCallbacks
 */
class Student 
{ 
    use Timestamps, SoftDeletes;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
    * @ORM\ManyToOne(targetEntity="School", inversedBy="students", cascade={"persist"})
    */
    protected $school;
    
    /**
    * @ORM\ManyToOne(targetEntity="User", inversedBy="students", cascade={"persist"})
    */
    protected $user;
    /**
    * @ORM\ManyToOne(targetEntity="Teacher", inversedBy="students", cascade={"persist"})
    */
    protected $incharge;
    /**
    * @ORM\ManyToOne(targetEntity="Section", inversedBy="students", cascade={"persist"})
    */
    protected $section;
    /**
    * @ORM\ManyToOne(targetEntity="Grade", inversedBy="students", cascade={"persist"})
    */
    protected $grade;
    /**
    * @ORM\OneToMany(targetEntity="Attendance", mappedBy="student", cascade={"persist"})
    * @var ArrayCollection|Attendance[]
    */
    protected $attendances;
    /**
    * @ORM\OneToMany(targetEntity="ExamAttendance", mappedBy="student", cascade={"persist"})
    * @var ArrayCollection|ExamAttendance[]
    */
    protected $examattendances;
     /**
    * @ORM\OneToMany(targetEntity="ExamMark", mappedBy="student", cascade={"persist"})
    * @var ArrayCollection|ExamMark[]
    */
    protected $exammarks;
    /**
    * @ORM\OneToMany(targetEntity="StudentSubject", mappedBy="student", cascade={"persist"})
    * @var ArrayCollection|StudentSubject[]
    */
    protected $studentsubjects;
     /**
    * @ORM\OneToMany(targetEntity="CourseStudent", mappedBy="student", cascade={"persist"})
    * @var ArrayCollection|CourseStudent[]
    */
    protected $coursestudents;
    /**
    * @ORM\OneToMany(targetEntity="FeeStudent", mappedBy="student", cascade={"persist"})
    * @var ArrayCollection|FeeStudent[]
    */
    protected $feestudents;
    /**
    * @ORM\OneToMany(targetEntity="SectionStudent", mappedBy="student", cascade={"persist"})
    * @var ArrayCollection|SectionStudent[]
    */
    protected $sectionstudents;
    /**
    * @ORM\OneToMany(targetEntity="ExaminationStudent", mappedBy="student", cascade={"persist"})
    * @var ArrayCollection|ExaminationStudent[]
    */
    protected $examinationstudents;
    /**
    * @ORM\OneToMany(targetEntity="HomeworkStudent", mappedBy="student", cascade={"persist"})
    * @var ArrayCollection|HomeworkStudent[]
    */
    protected $homeworkstudents;
    /**
    * @param $title
    */
    public function __construct(User $user,Teacher $incharge,School $school,Section $section, Grade $grade)
    {
        $this->user = $user;
        $this->incharge = $incharge;
        $this->school = $school;
        $this->section = $section;
        $this->grade = $grade;
        $this->attendances = new ArrayCollection;
        $this->examattendances = new ArrayCollection;
        $this->exammarks = new ArrayCollection;
        $this->studentsubjects = new ArrayCollection;
        $this->coursestudents = new ArrayCollection;
        $this->feestudents = new ArrayCollection;
        $this->sectionstudents = new ArrayCollection;
        $this->examinationstudents = new ArrayCollection;
        $this->homeworkstudents = new ArrayCollection;

    }

    public function getId()
    {
        return $this->id;
    }

    public function getUser()
    {
        return $this->user;
    }
     public function getIncharge()
    {
        return $this->incharge;
    }
   
     public function setIncharge(Teacher $incharge)
    {
       $this->incharge = $incharge;
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
        return $this->section;
    }
     public function getGrade()
    {
        return $this->grade;
    }
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
     public function getAttendance()
    {
        return $this->attendances;
    }
    public function getExamAttendance()
    {
        return $this->examattendances;
    }
    public function getExamMarks()
    {
        return $this->exammarks;
    }
    public function getStudentSubjects()
    {
        return $this->studentsubjects;
    }
    public function getCourseStudent()
    {
        return $this->coursestudents;
    }
     public function getFeeStudent()
    {
        return $this->feestudents;
    }
    public function getSectionStudents()
    {
        return $this->sectionstudents;
    }
    public function getExaminationStudents()
    {
        return $this->examinationstudents;
    }
    public function getHomeworkStudents()
    {
        return $this->homeworkstudents;
    }
}