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
 * @ORM\Table(name="incomes")
 * @ORM\HasLifecycleCallbacks
 */
class Income 
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

    /**
    * @ORM\ManyToOne(targetEntity="School", inversedBy="buildings", cascade={"persist"})
    */
    protected $school;
    /**
    * @ORM\OneToMany(targetEntity="Room", mappedBy="building", cascade={"persist"})
    * @var ArrayCollection|Room[]
    */
    
   
    /**
    * @param $title
    */
    public function __construct($name,$address,School $school)
    {
        $this->name = $name;
        $this->address = $address;
        $this->school = $school;
        $this->rooms = new ArrayCollection;
        $this->halls = new ArrayCollection;
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
    public function getRoom()
    {
        return $this->rooms;
    }
    public function getHall()
    {
        return $this->halls;
    }
     public function setAddress($address)
    {
       $this->address = $address;
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