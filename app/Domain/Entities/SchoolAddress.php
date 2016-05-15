<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\User;
use App\Domain\Entities\City;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name="schooladdresses")
 * @ORM\HasLifecycleCallbacks
 */
class SchoolAddress 
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
    protected $address;

    

    /**
    * @ORM\ManyToOne(targetEntity="School", inversedBy="schooladdresses", cascade={"persist"})
    */
    protected $school;
   
    /**
    * @ORM\ManyToOne(targetEntity="City", inversedBy="schooladdresses", cascade={"persist"})
    */
    protected $city;
    
    /**
    * @param $title
    */
    public function __construct($address,School $school,City $city)
    {
        $this->address = $address;
        $this->city = $city;
        $this->school = $school;
    }

    public function getId()
    {
        return $this->id;
    }

     public function getAddress()
    {
        return $this->address;
    }
   
     public function setAddress($address)
    {
       $this->address = $address;
    }

    public function setCity(City $city)
    {
        $this->city = $city;
    }

    public function getCity()
    {
        return $this->city;
    }
     public function getSchool()
    {
        return $this->school;
    }
}