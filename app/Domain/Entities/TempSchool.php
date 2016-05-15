<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\User;
use App\Domain\ValueObjects\Name;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="tempschools")
 */
class TempSchool 
{ 
    use Timestamps, SoftDeletes;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
  /**
     * The name value object which holds the
     * first, middle, additional and last name of the school
     * @ORM\Embedded(class="App\Domain\ValueObjects\Name", columnPrefix=false)
     *
     * @var Name
     */
    protected $name;
       /**
     * @ORM\Column(type="string")
     * @var Branch
     */
    protected $branch;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="tempschools", cascade={"persist"})
     * @var ArrayCollection|User[]
     */
    protected $user;

    
    public function __construct(Name $name, $branch, User $user)
    {
        $this->name = $name;
        $this->branch = $branch;
        $this->$user = $user;
    }

    public function getId()
    {
        return $this->id;
    }
     /**
     * @return string
     */
   /**
     * @return Name
     */
    public function getName()
    {
        
           if($this->name->getMiddlename() AND $this->name->getAdditionalname() AND $this->name->getExtraname()){
            return $this->name->getFirstname().' '.$this->name->getMiddlename().' '.$this->name->getAdditionalname().' '.$this->name->getLastname().' '.$this->name->getExtraname();
        }elseif($this->name->getMiddlename() AND $this->name->getAdditionalname()){
            return $this->name->getFirstname().' '.$this->name->getMiddlename().' '.$this->name->getLastname().' '.$this->name->getAdditionalname();
        }elseif($this->name->getMiddlename()){
            return $this->name->getFirstname().' '.$this->name->getMiddlename().' '.$this->name->getLastname();
        }else{
            return $this->name->getFirstname(). ' '.$this->name->getLastname();
        }
        
    }

    /**
     * @param Name $name
     */
    public function setName(Name $name)
    {
        $this->name = $name;
    }
    
    public function getBranch()
    {
        return $this->branch;
    }
   
}