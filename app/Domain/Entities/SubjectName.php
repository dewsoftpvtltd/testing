<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table(name="subject_names")
 */
class SubjectName
{ 
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
    * @ORM\OneToMany(targetEntity="Subject", mappedBy="subjectName", cascade={"persist"})
    * @var ArrayCollection|Subject[]
    */
    protected $subjects;
   
    /**
    * @param $name
    */
    public function __construct($name)
    {
        $this->name = $name; 
        $this->subjects=new ArrayCollection;   
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

}