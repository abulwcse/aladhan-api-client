<?php

namespace Abulh\Entity;

use DateTime;

class Calender
{
    /**
     * @var CalenderDay[]
     */
   private $days = [];

    /**
     * @return CalenderDay[]
     */
    public function getDays(): array
    {
        return $this->days;
    }

    /**
     * @param CalenderDay[] $days
     * @return Calender
     */
    public function setDays(array $days): Calender
    {
        $this->days = $days;
        return $this;
    }


    /**
     * @param CalenderDay $day
     * @return void
     */
    public function addDay(CalenderDay $day)
    {
        $this->days[] = $day;
    }

    /**
     * @param CalenderDay[] $days
     * @return void
     */
    public function addDays(array $days)
    {
        $this->days = array_merge_recursive($this->days , $days);
    }
}
