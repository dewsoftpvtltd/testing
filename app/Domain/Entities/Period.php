<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\School;
use App\Domain\Entities\Teacher;
use App\Domain\Entities\User;
use App\Domain\Entities\Subject;
use App\Domain\Entities\Room;
use App\Domain\Entities\Section;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name="periods")
 * @ORM\HasLifecycleCallbacks
 */
class Period 
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
    protected $name;
    /**
     * @ORM\Column(type="date")
     */
    protected $date;
     /**
     * @ORM\Column(type="time")
     */
    protected $starttime;
    /**
     * @ORM\Column(type="time")
     */
    protected $endtime;

    /**

    /**
    * @ORM\ManyToOne(targetEntity="School", inversedBy="periods", cascade={"persist"})
    */
    protected $school;
     /**
    * @ORM\ManyToOne(targetEntity="Teacher", inversedBy="periods", cascade={"persist"})
    */
    protected $teacher;
    /**
    * @ORM\ManyToOne(targetEntity="Section", inversedBy="periods", cascade={"persist"})
    */
    protected $section;
    /**
    * @ORM\ManyToOne(targetEntity="Grade", inversedBy="periods", cascade={"persist"})
    */
    protected $grade;
    /**
    * @ORM\ManyToOne(targetEntity="Room", inversedBy="periods", cascade={"persist"})
    */
    protected $room;
    /**
    * @ORM\ManyToOne(targetEntity="Subject", inversedBy="periods", cascade={"persist"})
    */
    protected $subject;
    /**
    * @ORM\OneToMany(targetEntity="Attendance", mappedBy="period", cascade={"persist"})
    * @var ArrayCollection|Attendance[]
    */
    protected $attendances;
    
   
    /**
    * @param $title
    */
    public function __construct($name=Null,$date,$starttime,$endtime,User $user,Teacher $teacher,School $school,Section $section, Grade $grade, Room $room, Subject $subject)
    {
        $this->name = $name;
        $this->date = $date;
        $this->starttime = $starttime;
        $this->endtime = $endtime;
        $this->user = $user;
        $this->teacher = $teacher;
        $this->school = $school;
        $this->section = $section;
        $this->grade = $grade;
        $this->subject = $subject;
        $this->room = $room;
        $this->attendances = new ArrayCollection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
     public function getDate()
    {
        return $this->date;
    } 
    public function setDate($date)
    {
       $this->date = $date;
    }
    public function getEndTime()
    {
        return $this->endtime;
    }
    public function getStartTime()
    {
        return $this->starttime;
    }
    

    public function getUser()
    {
        return $this->user;
    }
     public function getTeacher()
    {
        return $this->teacher;
    }
   
     public function setTeacher(Teacher $teacher)
    {
       $this->teacher = $teacher;
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
     public function getSubject()
    {
        return $this->subject;
    }
     public function getRoom()
    {
        return $this->room;
    }
    public function getAttendance()
    {
        return $this->attendances;
    }
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
}