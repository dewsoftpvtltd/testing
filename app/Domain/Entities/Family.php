<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\User;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
use Auth;
/**
 * @ORM\Entity
 * @ORM\Table(name="families")
 * @ORM\HasLifecycleCallbacks
 */
class Family 
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
    protected $relationship;
    /**
    * @ORM\ManyToOne(targetEntity="User", inversedBy="family", cascade={"persist"})
    */
    protected $familymember;
    /**
    * @ORM\ManyToOne(targetEntity="User", inversedBy="familyuser", cascade={"persist"})
    */
    protected $user;
    
    /**
    * @param $title
    */
    public function __construct($relationship,User $familymember,User $user)
    {
        $this->relationship = $relationship;
        $this->familymember = $familymember;
        $this->user = $user;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRelationship()
    {
        $relation = $this->relationship;
        if($relation == 'Husband' AND Auth::user()->getGender() == 0){
            return 'Wife';
        }elseif($relation == 'Husband' AND Auth::user()->getGender() == 1){
            return 'Husband';
        }else{
            return $relation;
        }
    }
     public function getFamilyMember()
    {
        return $this->familymember;
    }
     public function getFamilyMemberName()
    {
        if(Auth::user()->getName() !== $this->getFamilyMember()->getName()){
        return $this->getFamilyMember()->getName();
        }
    }
      public function getFamilyMemberEmail()
    {
        return $this->getFamilyMember()->getEmail();
    }
     public function getUserName()
    {
        return $this->user->getName();
    }
      public function getFamilyMemberInverseName()
    {
        if(Auth::user()->getName() !== $this->getUserName()){
           return $this->getUserName(); 
        }
        
    }
  
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
}