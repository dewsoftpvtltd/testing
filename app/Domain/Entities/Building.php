<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\School;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Entities\User;
use Carbon\Carbon;
use App\Domain\Entities\Traits\IdsNames;
use App\Domain\Entities\Traits\Skoolum;
/**
 * @ORM\Entity
 * @ORM\Table(name="buildings")
 * @ORM\HasLifecycleCallbacks
 */
class Building
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
    protected $name;
   
    /**
    * @ORM\ManyToOne(targetEntity="School", inversedBy="buildings", cascade={"persist"})
    */
    protected $school;
    /**
    * @ORM\OneToMany(targetEntity="BuildingAddress", mappedBy="building", cascade={"persist"})
    * @var ArrayCollection|BuildingAddress[]
    */
    protected $buildingaddresses;
    /**
    * @ORM\OneToMany(targetEntity="Room", mappedBy="building", cascade={"persist"})
    * @var ArrayCollection|Room[]
    */
    protected $rooms;
    /**
    * @ORM\OneToMany(targetEntity="Hall", mappedBy="building", cascade={"persist"})
    * @var ArrayCollection|Room[]
    */
    protected $halls;
    /**
    * @param $title
    */
    public function __construct($name,School $school)
    {
        $this->name = $name;
        $this->buildingaddresses = new ArrayCollection; 
        $this->school = $school;
        $this->rooms = new ArrayCollection;
        $this->halls = new ArrayCollection;
    }

}