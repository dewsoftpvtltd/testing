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
 * @ORM\Table(name="skoolumaccounts")
 * @ORM\HasLifecycleCallbacks
 */
class SkoolumAccount 
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
    protected $nameofsender;
    /**
     * @ORM\Column(type="integer")
     */
    protected $feeamount;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $dateofdeposit;
    /**

    /**
    * @ORM\ManyToOne(targetEntity="School", inversedBy="buildings", cascade={"persist"})
    */
   // protected $school;
    /**
    * @ORM\OneToMany(targetEntity="Room", mappedBy="building", cascade={"persist"})
    * @var ArrayCollection|Room[]
    */
    
   
    /**
    * @param $title
    */
    public function __construct($nameofsender,$feeamount,$dateofdeposit)
    {
        $this->nameofsender = $nameofsender;
        $this->feeamount = $feeamount;
        $this->dateofdeposit = $dateofdeposit;
      
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNameOfSender()
    {
        return $this->nameofsender;
    }
     public function getFeeAmount()
    {
        return $this->feeamount;
    }
   
     public function setFeeAmount($feeamount)
    {
       $this->feeamount = $feeamount;
    }

    public function setDateOfDeposit($dateofdeposit)
    {
        $this->dateofdeposit = $dateofdeposit;
    }

    public function getDateOfDeposit()
    {
        return $this->dateofdeposit;
    }
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
}