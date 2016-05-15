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
 * @ORM\Table(name="prospectuses")
 * @ORM\HasLifecycleCallbacks
 */
class Prospectus 
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
    protected $title;
    /**
     * @ORM\Column(type="string")
     */
    protected $details;
    /**
     * @ORM\Column(type="string")
     */
    protected $images;
    /**

    /**
    * @ORM\ManyToOne(targetEntity="School", inversedBy="prospectus", cascade={"persist"})
    */
    protected $school;
   
    
   
    /**
    * @param $title
    */
    public function __construct($title,$details,$images,School $school)
    {
        $this->title = $title;
        $this->details = $details;
        $this->school = $school;
        $this->images = $images;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }
     public function getDetail()
    {
        return $this->details;
    }
    public function getImage()
    {
        return $this->images;
    }
   
     public function setDetail($details)
    {
       $this->details = $details;
    }

    public function setSchool(School $school)
    {
        $this->school = $school;
    }

    public function getSchool()
    {
        return $this->school;
    }
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
}