<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Entities\Traits\Skoolum;
/**
 * @ORM\Entity
 * @ORM\Table(name="addresstypes")
 */
class AddressType 
{ 
  use Skoolum;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $type;

    /**
    * @ORM\OneToMany(targetEntity="Address", mappedBy="addresstype", cascade={"persist"})
    * @var ArrayCollection|Address[]
    */
   protected $addresses;
   
    
   
    /**
    * @param $title
    */
    public function __construct($type)
    {
        $this->type = $type;
        $this->addresses = new ArrayCollection;
    }

    public function getId()
    {
        return $this->id;
    }

   
   
   

}