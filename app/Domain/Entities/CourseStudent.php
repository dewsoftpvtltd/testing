<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\Course;
use App\Domain\Entities\Student;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
use App\Domain\Entities\Traits\IdsNames;
use App\Domain\Entities\Traits\Skoolum;
/**
 * @ORM\Entity
 * @ORM\Table(name="coursestudents")
 * @ORM\HasLifecycleCallbacks
 */
class CourseStudent 
{ 
    use Timestamps, SoftDeletes, Skoolum;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $rollno;

    /**
    * @ORM\ManyToOne(targetEntity="Course", inversedBy="coursestudents", cascade={"persist"})
    */
    protected $course;
   /**
    * @ORM\ManyToOne(targetEntity="Student", inversedBy="coursestudents", cascade={"persist"})
    */
    protected $student;
   
    /**
    * @param $title
    */
    public function __construct($rollno,Course $course, Student $student)
    {
        $this->rollno = $rollno;
        $this->course = $course;
        $this->student = $student;
       
    }

    public function getId()
    {
        return $this->id;
    }
    
   
}