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
 * @ORM\Table(name="noticeboards")
 * @ORM\HasLifecycleCallbacks
 */
class NoticeBoard 
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
     * @ORM\Column(type="text")
     */
    protected $description;

    /**

    /**
    * @ORM\ManyToOne(targetEntity="School", inversedBy="notices", cascade={"persist"})
    */
    protected $school;
   
    
   
    /**
    * @param $title
    */
    public function __construct($title,$description,School $school)
    {
        $this->title = $title;
        $this->description = $description;
        $this->school = $school;
        $this->rooms = new ArrayCollection;
        $this->halls = new ArrayCollection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function gettitle()
    {
        return $this->title;
    }
     public function getDescription()
    {
        return $this->description;
    }
    public function getRoom()
    {
        return $this->rooms;
    }
    public function getHall()
    {
        return $this->halls;
    }
     public function setDescription($description)
    {
       $this->description = $description;
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