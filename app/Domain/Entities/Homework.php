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
 * @ORM\Table(name="homeworks")
 * @ORM\HasLifecycleCallbacks
 */
class Homework 
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
    protected $name;
    /**
     * @ORM\Column(type="text")
     */
    protected $description;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $deadline;

     /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $startdate;
     /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $enddate;

    /**
    * @ORM\ManyToOne(targetEntity="Section", inversedBy="homeworks", cascade={"persist"})
    */
    protected $section;
    /**
    * @ORM\OneToMany(targetEntity="HomeworkStudent", mappedBy="homework", cascade={"persist"})
    * @var ArrayCollection|HomeworkStudent[]
    */
    protected $homeworkstudents;
    /**
    * @param $title
    */
    public function __construct($name,$description,$deadline = Null,$startdate=Null, $enddate=Null,Section $section)
    {
        $this->name = $name;
        $this->description = $description;
        $this->section = $section;
        $this->deadline = $deadline;
        $this->startdate = $startdate;
        $this->enddate = $enddate;
        $this->homeworkstudents = new ArrayCollection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
     public function getDescription()
    {
        return $this->description;
    }
    public function getDeadLine()
    {
        return $this->deadline;
    }
    public function getStartDate()
    {
        return $this->startdate;
    }
    public function getEndDate()
    {
        return $this->enddate;
    }
     public function setDescription($description)
    {
       $this->description = $description;
    }

    public function setSection(Section $section)
    {
        $this->section = $section;
    }

    public function getSection()
    {
        return $this->section;
    }
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
    public function getHomeworkStudents()
    {
        return $this->homeworkstudents;
    }
}