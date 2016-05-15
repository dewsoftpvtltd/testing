<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\Room;
use App\Domain\Entities\Building;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="facilities")
 */
class Facility
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
     * @ORM\ManyToMany(targetEntity="Room", mappedBy="facilities", cascade={"persist"})
     * @var ArrayCollection|Room[]
     */
    protected $rooms;
    /**
     * @ORM\ManyToMany(targetEntity="Hall", mappedBy="facilities", cascade={"persist"})
     * @var ArrayCollection|Hall[]
     */
    protected $halls;
    /**
    * @param $name
    */
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getRooms()
    {
        return $this->rooms;
    }
    public function getHalls()
    {
        return $this->halls;
    }
     
}