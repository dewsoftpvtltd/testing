<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\Fee;
use App\Domain\Entities\Student;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name="feestudents")
 * @ORM\HasLifecycleCallbacks
 */
class FeeStudent 
{ 
    use Timestamps, SoftDeletes;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="smallint")
     */
    protected $paymentstatus;
   

    /**
    * @ORM\ManyToOne(targetEntity="Student", inversedBy="feestudents", cascade={"persist"})
    */
    protected $student;
   /**
    * @ORM\ManyToOne(targetEntity="Fee", inversedBy="feestudents", cascade={"persist"})
    */
    protected $fees;
    
   
    /**
    * @param $title
    */
    public function __construct($paymentstatus,Student $student,Fee $fees)
    {
        $this->paymentstatus = $paymentstatus;
        $this->fees = $fees;
        $this->student = $student;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPaymentStatus()
    {
        return $this->paymentstatus;
    }
    public function getStudent()
    {
        return $this->student;
    }
    public function getFee()
    {
        return $this->fees;
    }
    
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
}