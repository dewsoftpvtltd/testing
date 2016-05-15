<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\Student;
use App\Domain\Entities\ExamAttendance;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name="exammarks")
 * @ORM\HasLifecycleCallbacks
 */
class ExamMark
{ 
    use Timestamps, SoftDeletes;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
     /**
     * @ORM\Column(type="integer")
     */
    protected $obtainedmarks;

    /**
    * @ORM\ManyToOne(targetEntity="Student", inversedBy="exammarks", cascade={"persist"})
    */
    protected $student;
    /**
    * @ORM\ManyToOne(targetEntity="ExamAttendance", inversedBy="exammarks", cascade={"persist"})
    */
    protected $examattendance;
    
   
    /**
    * @param $title
    */
    public function __construct($obtainedmarks,Student $student,ExamiAttendance $examattendance)
    {
        $this->student = new ArrayCollection;
        $this->examattendance = new ArrayCollection;
        $this->obtainedmarks = $obtainedmarks;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getObtainedMarks()
    {
        return $this->obtainedmarks;
    }
     public function getStudent()
    {
        return $this->student;
    }
    public function getExamAttendance()
    {
        return $this->examattendance;
    }
   
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
}