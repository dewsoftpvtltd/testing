<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\School;
use App\Domain\Entities\User;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name="packages")
 * @ORM\HasLifecycleCallbacks
 */
class Package 
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
     * @ORM\Column(type="string")
     */
    protected $description;
    /**
     * @ORM\Column(type="string")
     */
    protected $price;
  /**
     * @ORM\Column(type="string")
     */
    protected $registration;
    /**
     * @ORM\Column(type="string")
     */
    protected $type;

    /**
    * @ORM\OneToMany(targetEntity="School", mappedBy="package", cascade={"persist"})
    */
    protected $schools;
     /**
    * @ORM\OneToMany(targetEntity="UserPackage", mappedBy="package", cascade={"persist"})
    * @var ArrayCollection|UserPackage[]
    */
    protected $packageusers;
    /**
    * @ORM\OneToMany(targetEntity="PaymentRecord", mappedBy="package", cascade={"persist"})
    * @var ArrayCollection|PaymentRecord[]
    */
    protected $paymentrecords;
    
   
    /**
    * @param $title
    */
    public function __construct($name,$description,$price,$type,$registration)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->registration = 100 * $this->price;
        $this->packageusers = new ArrayCollection;
        $this->paymentrecords = new ArrayCollection;
        $this->schools = new ArrayCollection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
     public function getDescription()
    {
        return $this->description;
    }
    public function getPrice()
    {
        return $this->price;
    }
   public function getPackageUsers(){
        return $this->packageusers;
   }

    public function getSchools()
    {
        return $this->schools;
    }
    public function getRegistration()
    {
        return $this->registration;
    }
     public function getType()
    {
        return $this->type;
    }
    public function getPaymentRecords()
    {
        return $this->paymentrecords;
    }
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
}