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
 * @ORM\Table(name="userpackages")
 * @ORM\HasLifecycleCallbacks
 */
class UserPackage 
{ 
    use Timestamps, SoftDeletes;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
    * @ORM\ManyToOne(targetEntity="Package", inversedBy="packageusers", cascade={"persist"})
    */
   protected $package;

    /**
    * @ORM\ManyToOne(targetEntity="User", inversedBy="userpackages", cascade={"persist"})
    */
   protected $user;
    
   
    /**
    * @param $title
    */
    public function __construct(User $user, Package $package)
    {
        $this->user = $user;
        $this->package = $package;
    }

    public function getId()
    {
        return $this->id;
    }
   public function getUser()
    {
        return $this->user;
    }
     public function setUser(User $user)
    {
       $this->user[] = $user;
    }

    public function getPackage()
    {
        return $this->package;
    }
      public function setPackage(Package $package)
    {
       $this->package[] = $package;
    }
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
}