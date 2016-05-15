<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\School;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Entities\User;
use Carbon\Carbon;
use App\Domain\Entities\Traits\IdsNames;
use App\Domain\Entities\Traits\Skoolum;
/**
 * @ORM\Entity
 * @ORM\Table(name="contacts")
 * @ORM\HasLifecycleCallbacks
 */
class Contact
{ 
    use Timestamps, SoftDeletes,IdsNames,Skoolum;
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
    * @ORM\ManyToOne(targetEntity="School", inversedBy="contacts", cascade={"persist"})
    */
    protected $school;
    
   
    /**
    * @param $name
    */
    public function __construct($name,$email, $phone,$fax = NULL,School $school)
    {
        $this->name = $name;
        $this->email = $email;
        $this->school = $school;
        $this->phone = $phone;
        $this->fax = $fax;
    }

    
    

   
}