<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\School;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name="syllabi")
 * @ORM\HasLifecycleCallbacks
 */
class Syllabus 
{ 
    use Timestamps, SoftDeletes;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $details;
    
    /**
    * @ORM\OneToOne(targetEntity="Subject", mappedBy="syllabus", cascade={"persist"})
    */
    protected $subject;
    /**
    * @ORM\OneToOne(targetEntity="SyllabusTarget", inversedBy="syllabus", cascade={"persist"})
    */
    protected $target;
    /**
    * @ORM\OneToMany(targetEntity="SyllabusCompletion", mappedBy="syllabus", cascade={"persist"})
    */
    protected $completions;
   
    /**
    * @param $title
    */
    public function __construct($details,Subject $subject, SyllabusTarget $target)
    {
        $this->details = $details;
        $this->subject = $subject;
        $this->target = $target;
        $this->completions = new ArrayCollection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDetails()
    {
        return $this->details;
    }
     public function getSubject()
    {
        return $this->subject;
    }
    public function getTarget()
    {
        return $this->target;
    }
    public function getCompletions()
    {
        return $this->completions;
    }
     public function setSubject($subject)
    {
       $this->subject = $subject;
    }

   
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
}