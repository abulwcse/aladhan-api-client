<?php

namespace Abulh\Entity;

use DateTime;

class CalenderDay
{
    /**
     * @var DateTime
     */
    private $date;

    /**
     * @var HijriiDate
     */
    private $hijriDate;

    /**
     * @var PrayerTime
     */
    private $prayerTime;

    /**
     * @var array
     */
    private $metadata;

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     * @return CalenderDay
     */
    public function setDate(DateTime $date): CalenderDay
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return HijriiDate
     */
    public function getHijriDate(): HijriiDate
    {
        return $this->hijriDate;
    }

    /**
     * @param HijriiDate $hijriDate
     * @return CalenderDay
     */
    public function setHijriDate(HijriiDate $hijriDate): CalenderDay
    {
        $this->hijriDate = $hijriDate;
        return $this;
    }

    /**
     * @return PrayerTime
     */
    public function getPrayerTime(): PrayerTime
    {
        return $this->prayerTime;
    }

    /**
     * @param PrayerTime $prayerTime
     * @return CalenderDay
     */
    public function setPrayerTime(PrayerTime $prayerTime): CalenderDay
    {
        $this->prayerTime = $prayerTime;
        return $this;
    }

    /**
     * @return array
     */
    public function getMetadata(): array
    {
        return $this->metadata;
    }

    /**
     * @param array $metadata
     * @return CalenderDay
     */
    public function setMetadata(array $metadata): CalenderDay
    {
        $this->metadata = $metadata;
        return $this;
    }
}
