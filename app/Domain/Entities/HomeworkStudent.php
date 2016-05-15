<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\Student;
use App\Domain\Entities\Homework;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name="homeworkstudents")
 * @ORM\HasLifecycleCallbacks
 */
class HomeworkStudent 
{ 
    use Timestamps, SoftDeletes;
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
     * @ORM\Column(type="string")
     */
    protected $comments;

    /**
    * @ORM\ManyToOne(targetEntity="Student", inversedBy="homeworkstudents", cascade={"persist"})
    */
    protected $student;
    /**
    * @ORM\ManyToOne(targetEntity="Homework", inversedBy="homeworkstudents", cascade={"persist"})
    */
    protected $homework;
    
   
    /**
    * @param $title
    */
    public function __construct(Student $student,Homework $homework)
    {
        $this->student = $student;
        $this->homework = $homework;
        
    }

    public function getId()
    {
        return $this->id;
    }
    public function getStudent()
    {
        return $this->student;
    }
    public function getHomework()
    {
        return $this->homework;
    }
    public function setComments($comments)
    {
        $this->comments = $comments;
    }
     public function getComments()
    {
        return $this->comments;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
     public function getStatus()
    {
        return $this->status;
    }
    
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
    
}