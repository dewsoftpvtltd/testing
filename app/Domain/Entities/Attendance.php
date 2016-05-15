<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\Student;
use App\Domain\Entities\Period;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
use App\Domain\Entities\Traits\IdsNames;
use App\Domain\Entities\Traits\Skoolum;
/**
 * @ORM\Entity
 * @ORM\Table(name="attendances")
 * @ORM\HasLifecycleCallbacks
 */
class Attendance 
{ 
    use Timestamps, SoftDeletes, IdsNames,Skoolum;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
     /**
     * @ORM\Column(type="smallint")
     */
    protected $status;

    /**
    * @ORM\ManyToOne(targetEntity="Student", inversedBy="attendances", cascade={"persist"})
    */
    protected $student;
    /**
    * @ORM\ManyToOne(targetEntity="Period", inversedBy="attendances", cascade={"persist"})
    */
    protected $period;
    
   
    /**
    * @param $title
    */
    public function __construct($status, Student $student,Period $period)
    {
        $this->student = new ArrayCollection;
        $this->period = new ArrayCollection;
        $this->status = $status;
    }

   

   
   
    
}