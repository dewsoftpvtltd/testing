<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\School;
use App\Domain\Entities\Grade;
use App\Domain\Entities\FeeType;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name="fees")
 * @ORM\HasLifecycleCallbacks
 */
class Fee 
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
     * @ORM\Column(type="integer")
     */
    protected $amount;

    
    /**
    * @ORM\ManyToOne(targetEntity="School", inversedBy="fees", cascade={"persist"})
    */
    protected $school;
    /**
    * @ORM\ManyToOne(targetEntity="Grade", inversedBy="fees", cascade={"persist"})
    */
    protected $grade;
    /**
    * @ORM\ManyToOne(targetEntity="FeeType", inversedBy="fees", cascade={"persist"})
    */
    protected $feetype;
    /**
    * @ORM\OneToMany(targetEntity="FeeStudent", mappedBy="fees", cascade={"persist"})
    * @var ArrayCollection|FeeStudent[]
    */
    protected $feestudents;
    
   
    /**
    * @param $title
    */
    public function __construct($name,$amount,School $school,Grade $grade,FeeType $feetype)
    {
        $this->name = $name;
        $this->amount = $amount;
        $this->school = $school;
        $this->grade = $grade;
        $this->feetype = $feetype;
        $this->feestudents = new ArrayCollection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
     public function getAmount()
    {
        return $this->amount;
    }
    public function getGrade()
    {
        return $this->grade;
    }
    public function getFeeType()
    {
        return $this->feetype;
    }
     public function setAmount($amount)
    {
       $this->amount = $amount;
    }

    public function setSchool(School $school)
    {
        $this->school = $school;
    }

    public function getSchool()
    {
        return $this->school;
    }
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
     public function getFeeStudent()
    {
        return $this->feestudents;
    }
}