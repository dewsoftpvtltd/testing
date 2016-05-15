<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\Country;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table(name="states")
 */
class State 
{ 
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
    * @ORM\ManyToOne(targetEntity="Country", inversedBy="states", cascade={"persist"})
    */
    protected $country;
   /**
    * @ORM\OneToMany(targetEntity="Address", mappedBy="state", cascade={"persist"})
    */
    protected $addresses;
   
   /**
    * @ORM\OneToMany(targetEntity="City", mappedBy="state", cascade={"persist"})
    */
    protected $cities;
    /**
    * @param $title
    */
    public function __construct($name,Country $country,Address $addresses)
    {
        $this->name = $name;
        $this->country = $country;
        $this->addresses = new ArrayCollection;
        $this->cities = new ArrayCollection;
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
        return $this->addresses;
    }
    public function getCities()
    {
        return $this->cities;
    }
 
     public function setAddress($address)
    {
       $this->address = $address;
    }

    public function setCountry(Country $country)
    {
        $this->country = $country;
    }

    public function getCountry()
    {
        return $this->country;
    }
    
}