<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\School;
use App\Domain\Entities\Teacher;
use App\Domain\Entities\User;
use App\Domain\Entities\Subject;
use App\Domain\Entities\Room;
use App\Domain\Entities\Section;
use App\Domain\Entities\ExamAttendance;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;use App\Domain\Entities\Traits\IdsNames;
use App\Domain\Entities\Traits\Skoolum;
use App\Domain\Entities\Traits\StartsEnds;
/**
 * @ORM\Entity
 * @ORM\Table(name="examinations")
 * @ORM\HasLifecycleCallbacks
 */
class Examination 
{ 
    use Timestamps, SoftDeletes, IdsNames, Skoolum, StartsEnds;
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
     * @ORM\Column(type="string", nullable=true)
     */
    protected $location;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $totalmarks;

    /**

    /**
    * @ORM\ManyToOne(targetEntity="School", inversedBy="examinations", cascade={"persist"})
    */
    protected $school;
     /**
    * @ORM\ManyToOne(targetEntity="Teacher", inversedBy="examinations", cascade={"persist"})
    */
    protected $teacher;
    /**
    * @ORM\ManyToOne(targetEntity="Section", inversedBy="examinations", cascade={"persist"})
    */
    protected $section;
    /**
    * @ORM\ManyToOne(targetEntity="Grade", inversedBy="examinations", cascade={"persist"})
    */
    protected $grade;
    /**
    * @ORM\ManyToOne(targetEntity="Room", inversedBy="examinations", cascade={"persist"})
    */
    protected $room;
    /**
    * @ORM\ManyToOne(targetEntity="Subject", inversedBy="examinations", cascade={"persist"})
    */
    protected $subject;
     /**
    * @ORM\OneToMany(targetEntity="ExamAttendance", mappedBy="examination", cascade={"persist"})
    * @var ArrayCollection|ExamAttendance[]
    */
    protected $examattendances;
    /**
      * @ORM\OneToMany(targetEntity="ExaminationStudent", mappedBy="examination", cascade={"persist"})
    * @var ArrayCollection|ExaminationStudent[]
    */
    protected $examinationstudents;
   
    /**
    * @param $title
    */
    public function __construct($name=Null,$date,$starttime,$endtime,$totalmarks, $location,User $user,Teacher $teacher,School $school,Section $section, Grade $grade, Room $room, Subject $subject)
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
        $this->totalmarks = $totalmarks;
        $this->location = $location;
        $this->examattendances = new ArrayCollection;
        $this->examinationstudents = new ArrayCollection;
    }

   
     
}