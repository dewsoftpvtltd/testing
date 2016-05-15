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
 * @ORM\Table(name="buildingaddresses")
 * @ORM\HasLifecycleCallbacks
 */
class BuildingAddress 
{ 
    use Timestamps, SoftDeletes,Skoolum;
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
    * @ORM\ManyToOne(targetEntity="Building", inversedBy="buildingaddresses", cascade={"persist"})
    */
    protected $building;
   
    /**
    * @ORM\ManyToOne(targetEntity="City", inversedBy="buildingaddresses", cascade={"persist"})
    */
    protected $city;
    
    /**
    * @param $title
    */
    public function __construct($address,Building $building,City $city)
    {
        $this->address = $address;
        $this->city = $city;
        $this->building = $building;
    }

    public function getId()
    {
        return $this->id;
    }

     
    
}