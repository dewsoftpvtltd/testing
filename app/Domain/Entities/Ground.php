<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\School;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Entities\User;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name="grounds")
 * @ORM\HasLifecycleCallbacks
 */
class Ground
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
     * @ORM\Column(type="string")
     */
    protected $location;
    /**
     * @ORM\Column(type="string")
     */
    protected $seats;
    /**

    /**
    * @ORM\ManyToOne(targetEntity="School", inversedBy="grounds", cascade={"persist"})
    */
    protected $school;
    
   
    /**
    * @param $name
    */
    public function __construct($name,$location, $seats, School $school)
    {
        $this->name = $name;
        $this->location = $location;
        $this->school = $school;
        $this->seats = $seats;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
     public function getLocation()
    {
        return $this->location;
    }
    public function getSeats()
    {
        return $this->seats;
    }
   
     public function setLocation($location)
    {
       $this->location = $location;
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