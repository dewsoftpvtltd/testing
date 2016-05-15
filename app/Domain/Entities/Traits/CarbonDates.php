<?php
namespace App\Domain\Entities\Traits;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Carbon\Carbon;

trait CarbonDates
{

    public function getCarbonStartDate()
    {
        return Carbon::parse($this->startdate->format('d-m-Y'))->toFormattedDateString();
    }
     public function getCarbonEndDate()
    {
         return Carbon::parse($this->enddate->format('d-m-Y'))->toFormattedDateString();
    }
     public function getCarbonCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('d-m-Y'))->diffForHumans();
    }

}