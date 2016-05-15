<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\Student;
use App\Domain\Entities\Section;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name="sectionstudents")
 * @ORM\HasLifecycleCallbacks
 */
class SectionStudent 
{ 
    use Timestamps, SoftDeletes;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
    * @ORM\ManyToOne(targetEntity="Student", inversedBy="sectionstudents", cascade={"persist"})
    */
    protected $student;
    /**
    * @ORM\ManyToOne(targetEntity="Section", inversedBy="sectionstudents", cascade={"persist"})
    */
    protected $section;
    
   
    /**
    * @param $title
    */
    public function __construct(Student $student,Section $section)
    {
        $this->student = $student;
        $this->section = $section;
        
    }

    public function getId()
    {
        return $this->id;
    }
    public function getStudent()
    {
        return $this->student;
    }
    public function getSection()
    {
        return $this->section;
    }
    
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
    
}