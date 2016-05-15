<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\Student;
use App\Domain\Entities\Subject;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name="studentsubjects")
 * @ORM\HasLifecycleCallbacks
 */
class StudentSubject 
{ 
    use Timestamps, SoftDeletes;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
    * @ORM\ManyToOne(targetEntity="Student", inversedBy="studentsubjects", cascade={"persist"})
    */
    protected $student;
    /**
    * @ORM\ManyToOne(targetEntity="Subject", inversedBy="studentsubjects", cascade={"persist"})
    */
    protected $subject;
    
   
    /**
    * @param $title
    */
    public function __construct(Student $student,Subject $subject)
    {
        $this->student = $student;
        $this->subject = $subject;
        
    }

    public function getId()
    {
        return $this->id;
    }
    public function getStudent()
    {
        return $this->student;
    }
    public function getSubject()
    {
        return $this->subject;
    }
    
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
    
}