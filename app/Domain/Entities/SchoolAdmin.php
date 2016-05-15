<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\School;
use App\Domain\Entities\User;
use App\Domain\Entities\Subject;
use App\Domain\Entities\Section;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name="schooladmins")
 * @ORM\HasLifecycleCallbacks
 */
class SchoolAdmin 
{ 
    use Timestamps, SoftDeletes;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $designation;
    /**
     * @ORM\Column(type="string")
     */
    protected $schoolrole;

    /**
    * @ORM\ManyToOne(targetEntity="School", inversedBy="schooladmins", cascade={"persist"})
    */
    protected $school;
     /**
    * @ORM\ManyToOne(targetEntity="User", inversedBy="schooladmins", cascade={"persist"})
    */
    protected $user;
    
    /**
    * @param $title
    */
    public function __construct($designation,$schoolrole,School $school, User $user, Subject $subjectsallotted, Section $sectionsallotted)
    {
        $this->designation = $designation;
        $this->schoolrole = $schoolrole;
        $this->school = $school;
        $this->user = $user;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDesignation()
    {
        return $this->designation;
    }
     public function getSchoolrole()
    {
        return $this->schoolrole;
    }
   
     public function setSchoolrole($schoolrole)
    {
       $this->schoolrole = $schoolrole;
    }

    public function setSchool(School $school)
    {
        $this->school = $school;
    }

    public function getSchool()
    {
        return $this->school;
    }
     
    public function setUser(User $user)
    {
        $this->users[] = $user;
    }
    
     public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }
}