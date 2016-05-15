<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Entities\Traits\IdsNames;
use App\Domain\Entities\Traits\Skoolum;
/**
 * @ORM\Entity
 * @ORM\Table(name="cities")
 */
class City 
{ 
    use IdsNames,Skoolum;
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
    * @ORM\ManyToOne(targetEntity="State", inversedBy="cities", cascade={"persist"})
    */
    protected $state;
   /**
    * @ORM\OneToMany(targetEntity="Address", mappedBy="city", cascade={"persist"})
    */
    protected $addresses;
   
   /**
    * @ORM\OneToMany(targetEntity="BuildingAddress", mappedBy="city", cascade={"persist"})
    */
    protected $buildingaddresses;
    /**
    * @ORM\OneToMany(targetEntity="SchoolAddress", mappedBy="city", cascade={"persist"})
    */
    protected $schooladdresses;
    /**
    * @param $title
    */
    public function __construct($name,State $state,Address $addresses)
    {
        $this->name = $name;
        $this->state = $state;
        $this->addresses = new ArrayCollection;
        $this->buildingaddresses = new ArrayCollection;
        $this->schooladdresses = new ArrayCollection;
    }

     
   

   
    
}