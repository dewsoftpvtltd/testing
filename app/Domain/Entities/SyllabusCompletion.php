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
 * @ORM\Table(name="syllabuscompletions")
 * @ORM\HasLifecycleCallbacks
 */
class SyllabusCompletion 
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
    protected $detail;
    /**
     * @ORM\Column(type="integer")
     */
    protected $percent;

    /**
     * @ORM\Column(type="date")
     */
    protected $timeline;

    /**
    * @ORM\ManyToOne(targetEntity="Syllabus", inversedBy="completions", cascade={"persist"})
    */
    protected $syllabus;
    
    /**
    * @param $title
    */
    public function __construct($detail,$percent,$timeline,Syllabus $syllabus)
    {
        $this->detail = $detail;
        $this->percent = $percent;
        $this->timeline = $timeline;
        $this->syllabus = $syllabus;

    }

    public function getId()
    {
        return $this->id;
    }

    public function getDetail()
    {
        return $this->detail;
    }
     public function getpercent()
    {
        return $this->percent;
    }
    
     public function setPercent($percent)
    {
       $this->percent = $percent;
    }

    public function setTimeline($timeline)
    {
        $this->timeline = $timeline;
    }

    public function getTimeline()
    {
        return $this->timeline;
    }
    public function getSyllabus()
    {
        return $this->syllabus;
    }
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
}