<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\School;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
use App\Domain\Entities\Traits\StartsEnds;
use App\Domain\Entities\Traits\IdsNames;
use App\Domain\Entities\Traits\Skoolum;
/**
 * @ORM\Entity
 * @ORM\Table(name="courses")
 * @ORM\HasLifecycleCallbacks
 */
class Course 
{ 
    use Timestamps, SoftDeletes, StartsEnds,IdsNames,Skoolum;
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
    * @ORM\ManyToOne(targetEntity="School", inversedBy="courses", cascade={"persist"})
    */
    protected $school;
     /**
    * @ORM\OneToMany(targetEntity="CourseStudent", mappedBy="course", cascade={"persist"})
    * @var ArrayCollection|CourseStudent[]
    */
    protected $coursestudents;
    /**
    * @ORM\OneToMany(targetEntity="CourseTeacher", mappedBy="course", cascade={"persist"})
    * @var ArrayCollection|CourseTeacher[]
    */
    protected $courseteachers;
    /**
    * @param $title
    */
    public function __construct($name,$session,$startdate,$enddate,School $school)
    {
        $this->name = $name;
        $this->session = $session;
        $this->enddate = $enddate;
        $this->startdate = $startdate;
        $this->school = $school;
        $this->coursestudents = new ArrayCollection;
        $this->courseteachers = new ArrayCollection;
    }

   
    
}