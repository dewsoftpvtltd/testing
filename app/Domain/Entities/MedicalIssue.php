<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\User;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name="medicalissues")
 * @ORM\HasLifecycleCallbacks
 */
class MedicalIssue 
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
    * @ORM\ManyToOne(targetEntity="User", inversedBy="medicalissues", cascade={"persist"})
    */
    protected $user;
   
    /**
    * @param $title
    */
    public function __construct($name,$description)
    {
        $this->name = $name;
        $this->description = $description;
        $this->user = $user;
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
    public function getUser()
    {
        return $this->user;
    }
     public function setDescription($description)
    {
       $this->description = $description;
    }
    
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
}