<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\Student;
use App\Domain\Entities\Examination;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
use App\Domain\Entities\Traits\IdsNames;
use App\Domain\Entities\Traits\Skoolum;
/**
 * @ORM\Entity
 * @ORM\Table(name="examattendances")
 * @ORM\HasLifecycleCallbacks
 */
class ExamAttendance 
{ 
    use Timestamps, SoftDeletes, IdsNames, Skoolum;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
     /**
     * @ORM\Column(type="smallint")
     */
    protected $status;

    /**
    * @ORM\ManyToOne(targetEntity="Student", inversedBy="examattendances", cascade={"persist"})
    */
    protected $student;
    /**
    * @ORM\ManyToOne(targetEntity="Examination", inversedBy="examattendances", cascade={"persist"})
    */
    protected $examination;
     /**
    * @ORM\OneToMany(targetEntity="ExamMark", mappedBy="examattendance", cascade={"persist"})
    * @var ArrayCollection|ExamMark[]
    */
    protected $exammarks;
   
    /**
    * @param $title
    */
    public function __construct($status, Student $student,Examination $examination)
    {
        $this->student = new ArrayCollection;
        $this->examination = new ArrayCollection;
        $this->exammarks = new ArrayCollection;
        $this->status = $status;
    }

}