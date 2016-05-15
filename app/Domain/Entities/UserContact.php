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
 * @ORM\Table(name="usercontacts")
 * @ORM\HasLifecycleCallbacks
 */
class UserContact
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
    protected $email;
    /**
     * @ORM\Column(type="string")
     */
    protected $phone;
    /**
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $fax;
    /**
    /**
    * @ORM\ManyToOne(targetEntity="User", inversedBy="usercontacts", cascade={"persist"})
    */
    protected $user;
    
   
    /**
    * @param $name
    */
    public function __construct($name,$email, $phone,$fax = NULL,User $user)
    {
        $this->name = $name;
        $this->email = $email;
        $this->user = $user;
        $this->phone = $phone;
        $this->fax = $fax;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
     public function getEmail()
    {
        return $this->email;
    }
    public function getPhone()
    {
        return $this->phone;
    }
   
     public function setEmail($email)
    {
       $this->email = $email;
    }
    public function getFax()
    {
        return $this->fax;
    }
    public function setFax($fax)
    {
         $this->fax = $fax;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
}