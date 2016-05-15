<?php
namespace App\Domain\Entities\Traits;


use Doctrine\ORM\Mapping as ORM;

trait IdsNames
{
     public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
