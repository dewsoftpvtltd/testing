<?php

namespace App\Domain\ValueObjects;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
class Name
{
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $firstname;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    protected $middlename;
  /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $lastname;
      /**
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    protected $additionalname;
      /**
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    protected $extraname;
    /**
     * @param string $firstname
     * @param string $lastname
     * @param string $middlename
     * @param string $additionalname
     * @param string $extraname
     */
    public function __construct($firstname, $lastname, $middlename=NULL, $additionalname=NULL, $extraname=NULL)
    {
        $this->firstname = $firstname;
        $this->lastname  = $lastname;
        $this->middlename  = $middlename;
        $this->additionalname  = $additionalname;
        $this->extraname  = $extraname;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }
    /**
     * @return string
     */
    public function getMiddlename()
    {
        return $this->middlename;
    }

    /**
     * @param string $middlename
     */
    public function setMiddlename($middlename)
    {
        $this->middlename = $middlename;
    }
    /**
     * @return string
     */
    public function getAdditionalname()
    {
        return $this->additionalname;
    }

    /**
     * @param string $additionalname
     */
    public function setAdditionalname($additionalname)
    {
        $this->additionalname = $additionalname;
    }
    /**
     * @return string
     */
       public function getExtraname()
    {
        return $this->extraname;
    }

    /**
     * @param string $extraname
     */
    public function setExtraname($extraname)
    {
        $this->extraname = $extraname;
    }

}
