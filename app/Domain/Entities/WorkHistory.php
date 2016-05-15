<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\User;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name="workhistories")
 * @ORM\HasLifecycleCallbacks
 */
class WorkHistory 
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
    protected $address;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $nature;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $position;
    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $startdate;
     /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $enddate;

    /**

    /**
    * @ORM\ManyToOne(targetEntity="User", inversedBy="workhistories", cascade={"persist"})
    */
    protected $user;
    
   
    /**
    * @param $title
    */
    public function __construct($name,$address,$nature=Null,$position=Null, $startdate=Null, $enddate=Null,User $user)
    {
        $this->name = $name;
        $this->address = $address;
        $this->user = $user;
        $this->nature = $nature;
        $this->position = $position;
        $this->startdate = $startdate;
        $this->enddate = $enddate;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
     public function getAddress()
    {
        return $this->address;
    }
     public function setAddress($address)
    {
       $this->address = $address;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
     public function getStartDate()
    {
        return Carbon::parse($this->startdate->format('d-m-Y'))->toFormattedDateString();
    }
     public function getEndDate()
    {
         return Carbon::parse($this->enddate->format('d-m-Y'))->toFormattedDateString();
    }
     public function getPosition()
    {
        return $this->position;
    }
     public function getNature()
    {
        return $this->nature;
    }

}