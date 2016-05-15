<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\School;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name="feetypes")
 * @ORM\HasLifecycleCallbacks
 */
class FeeType 
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
    protected $type;

    /**
    * @ORM\OneToMany(targetEntity="Fee", mappedBy="feetype", cascade={"persist"})
    * @var ArrayCollection|Fee[]
    */
   protected $fees;
    
   
    /**
    * @param $title
    */
    public function __construct($type,Fee $fees)
    {
        $this->type = $type;
        $this->fees = new ArrayCollection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }
     
    public function getFees()
    {
        return $this->fees;
    }
    
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
}