<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\Student;
use App\Domain\Entities\Examination;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name="examinationstudents")
 * @ORM\HasLifecycleCallbacks
 */
class ExaminationStudent 
{ 
    use Timestamps, SoftDeletes;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
    * @ORM\ManyToOne(targetEntity="Student", inversedBy="examinationstudents", cascade={"persist"})
    */
    protected $student;
    /**
    * @ORM\ManyToOne(targetEntity="Examination", inversedBy="examinationstudents", cascade={"persist"})
    */
    protected $examination;
    
   
    /**
    * @param $title
    */
    public function __construct(Student $student,Examination $examination)
    {
        $this->student = $student;
        $this->examination = $examination;
        
    }

    public function getId()
    {
        return $this->id;
    }
    public function getStudent()
    {
        return $this->student;
    }
    public function getExamination()
    {
        return $this->examination;
    }
    
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
    
}