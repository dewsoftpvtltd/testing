<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\School;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
use App\Domain\Entities\Traits\IdsNames;
use App\Domain\Entities\Traits\Skoolum;
use App\Domain\Entities\Traits\StartsEnds;
/**
 * @ORM\Entity
 * @ORM\Table(name="duties")
 * @ORM\HasLifecycleCallbacks
 */
class Duty 
{ 
    use Timestamps, SoftDeletes,IdsNames,Skoolum,StartsEnds;
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
     * @ORM\Column(type="time")
     */
    protected $starttime;
    /**
     * @ORM\Column(type="time")
     */
    protected $endtime;
    

    /**
    * @ORM\ManyToOne(targetEntity="School", inversedBy="duties", cascade={"persist"})
    */
    protected $school;
   /**
    * @ORM\ManyToOne(targetEntity="User", inversedBy="duties", cascade={"persist"})
    */
    protected $assignedto;
    /**
    * @param $title
    */
    public function __construct($name,$description,$startdate,$starttime,$enddate, $endtime,School $school,User $assignedto)
    {
        $this->name = $name;
        $this->description = $description;
        $this->enddate = $enddate;
        $this->startdate = $startdate;
        $this->starttime = $starttime;
        $this->endtime = $endtime;
        $this->school = $school;
        $this->assignedto = $assignedto;
    }

}