<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Entities\Traits\IdsNames;
use App\Domain\Entities\Traits\Skoolum;

/**
 * @ORM\Entity
 * @ORM\Table(name="countries")
 */
class Country 
{ 
   use skoolum,IdsNames;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=2)
     */
    protected $code;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

 
    /**
    * @ORM\OneToMany(targetEntity="State", mappedBy="country", cascade={"persist"})
    * @var ArrayCollection|City[]
    */
    protected $states;
    /**
    * @ORM\OneToMany(targetEntity="User", mappedBy="country", cascade={"persist"})
    * @var ArrayCollection|User[]
    */
    protected $users;
   
    /**
    * @param $title
    */
    public function __construct($name)
    {
        $this->name = $name;
        $this->states = new ArrayCollection;
        $this->users = new ArrayCollection;
    }

    
    
}