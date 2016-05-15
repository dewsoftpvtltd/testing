<?php
namespace App\Domain\Entities\Traits;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

trait StartsEnds
{
    /**
     * @ORM\Column(name="startdate", type="datetime", nullable=false)
     * @var DateTime
     */
    protected $startdate;

    /**
     * @ORM\Column(name="enddate", type="datetime", nullable=false)
     * @var DateTime
     */
    protected $enddate;

    /**
     * @return DateTime
     */
    public function getStartDate()
    {
        return $this->startdate;
    }

    /**
     * @return DateTime
     */
    public function getEndDate()
    {
        return $this->enddate;
    }

    /**
     * @param DateTime $startdate
     */
    public function setStartDate(DateTime $startdate)
    {
        $this->startdate = $startdate;
        return $this;
    }

    /**
     * @param DateTime $enddate
     */
    public function setEndDate(DateTime $enddate)
    {
        $this->enddate = $enddate;
    }
}
