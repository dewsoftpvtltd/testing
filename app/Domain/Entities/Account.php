<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\School;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
use App\Domain\Entities\Traits\IdsNames;
use App\Domain\Entities\Traits\Skoolum;
/**
 * @ORM\Entity
 * @ORM\Table(name="accounts")
 * @ORM\HasLifecycleCallbacks
 */
class Account 
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

}