<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\Course;
use App\Domain\Entities\Teacher;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
use App\Domain\Entities\Traits\Skoolum;
/**
 * @ORM\Entity
 * @ORM\Table(name="courseteachers")
 * @ORM\HasLifecycleCallbacks
 */
class CourseTeacher 
{ 
    use Timestamps, SoftDeletes, Skoolum;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
    * @ORM\ManyToOne(targetEntity="Course", inversedBy="courseteachers", cascade={"persist"})
    */
    protected $course;
   /**
    * @ORM\ManyToOne(targetEntity="Teacher", inversedBy="courseteachers", cascade={"persist"})
    */
    protected $teacher;
   
    /**
    * @param $title
    */
    public function __construct(Course $course, Teacher $teacher)
    {
        $this->course = $course;
        $this->teacher = $teacher;
       
    }

    public function getId()
    {
        return $this->id;
    }

   
}