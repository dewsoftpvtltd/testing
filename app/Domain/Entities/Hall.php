<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\User;
use App\Domain\Entities\Building;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name="halls")
 */
class Hall
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
    * @ORM\ManyToOne(targetEntity="Building", inversedBy="halls", cascade={"persist"})
    */
    protected $building;
    /**
     * @ORM\ManyToMany(targetEntity="Facility", inversedBy="halls", cascade={"persist"})
     * @var ArrayCollection|Facility[]
     */
    protected $facilities;

    /**
    * @param $name
    */
    public function __construct($name, Building $building, Facility $facilities)
    {
        $this->name = $name;
        $this->building = $building;
        $this->facilities = $facilities;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setBuilding(Building $building)
    {
        $this->building = $building;
    }

    public function getBuilding()
    {
        return $this->building;
    }
    public function getFacility()
    {
        return $this->facilities;
    }
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
}