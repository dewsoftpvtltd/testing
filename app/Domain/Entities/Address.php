<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\User;
use App\Domain\Entities\City;
use App\Domain\Entities\AddressType;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
use App\Domain\Entities\Traits\IdsNames;
use App\Domain\Entities\Traits\Skoolum;
/**
 * @ORM\Entity
 * @ORM\Table(name="addresses")
 * @ORM\HasLifecycleCallbacks
 */
class Address 
{ 
    use Timestamps, SoftDeletes,IdsNames,Skoolum;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $address;

    /**

    /**
    * @ORM\ManyToOne(targetEntity="User", inversedBy="addresses", cascade={"persist"})
    */
    protected $user;
    /**
    * @ORM\ManyToOne(targetEntity="AddressType", inversedBy="addresses", cascade={"persist"})
    */
    protected $addresstype;
    /**
    * @ORM\ManyToOne(targetEntity="City", inversedBy="addresses", cascade={"persist"})
    */
    protected $city;
    /**
    * @ORM\ManyToOne(targetEntity="State", inversedBy="addresses", cascade={"persist"})
    */
    protected $state;
    /**
    * @param $title
    */
    public function __construct($address,City $city,State $state,AddressType $addresstype)
    {
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->addresstype = $addresstype;
    }
 public function setSchool($school)
    {
        $this->school = $school;
        return $this;
    }
    public function setRoom(Room $room)
    {
       $this->room = $room;
       return $this;
    }
    
}