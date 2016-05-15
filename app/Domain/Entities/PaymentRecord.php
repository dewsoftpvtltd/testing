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
 * @ORM\Table(name="paymentrecords")
 * @ORM\HasLifecycleCallbacks
 */
class PaymentRecord 
{ 
    use Timestamps, SoftDeletes;
   

    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    protected $account;
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    protected $type;
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $amount;
    /**
     * @ORM\Column(type="string")
     * @ORM\Id
     */
    protected $date;
   
  
    /**
     * @ORM\Id
     * @ORM\Column(type="smallint", nullable=true)
     */
    protected $accountedfor;


    /**
     * @ORM\Id
    * @ORM\ManyToOne(targetEntity="User", inversedBy="paymentrecords", cascade={"persist"})
    */
    protected $user;

    /**
     * @ORM\Id
    * @ORM\ManyToOne(targetEntity="Package", inversedBy="paymentrecords", cascade={"persist"})
    */
    protected $package;
   /**
     * @ORM\Id
    * @ORM\ManyToOne(targetEntity="School", inversedBy="paymentrecords", cascade={"persist"})
    */
    protected $school;
    /**
    * @param $title
    */
    public function __construct($account,$amount,$type,$date,$accountedfor=NULL,User $user,Package $package, School $school)
    {
        $this->account = $account;
        $this->amount = $amount;
        $this->type = $type;
        $this->date = $date;
        $this->accountedfor = $accountedfor;
        $this->user = $user;
        $this->package = $package;
        $this->school = $school;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAccount()
    {
        return $this->account;
    }
     public function getAmount()
    {
        return $this->amount;
    }
   
    public function getDate()
    {
        return $this->date;
    }
    public function getUser()
    {
        return $this->user;
    }
     public function setAmount($Amount)
    {
       $this->Amount = $Amount;
    }

    public function setSchool(School $school)
    {
        $this->school = $school;
    }

    public function getAccountedFor()
    {
        return $this->accountedfor;
    }
    public function getPackage()
    {
        return $this->package;
    }
    public function getSchool()
    {
        return $this->school;
    }
    public function getType()
    {
        return ucfirst($this->type);
    }
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
}