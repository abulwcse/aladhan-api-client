<?php


namespace Abulh\Entity;



use DateTime;

class PrayerTime
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
     * @var string
     */
    private $fajr;

    /**
     * @var string
     */
    private $sunrise;

    /**
     * @var string
     */
    private $dhuhr;

    /**
     * @var string
     */
    private $asr;

    /**
     * @var string
     */
    private $sunset;

    /**
     * @var string
     */
    private $maghrib;

    /**
     * @var string
     */
    private $isha;

    /**
     * @var string
     */
    private $imsak;

    /**
     * @var string
     */
    private $midnight;


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
     * @return PrayerTime
     */
    public function setDate(DateTime $date): PrayerTime
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
     * @return PrayerTime
     */
    public function setHijriDate(HijriiDate $hijriDate): PrayerTime
    {
        $this->hijriDate = $hijriDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getFajr(): string
    {
        return $this->fajr;
    }

    /**
     * @param string $fajr
     * @return PrayerTime
     */
    public function setFajr(string $fajr): PrayerTime
    {
        $this->fajr = $fajr;
        return $this;
    }

    /**
     * @return string
     */
    public function getSunrise(): string
    {
        return $this->sunrise;
    }

    /**
     * @param string $sunrise
     * @return PrayerTime
     */
    public function setSunrise(string $sunrise): PrayerTime
    {
        $this->sunrise = $sunrise;
        return $this;
    }

    /**
     * @return string
     */
    public function getDhuhr(): string
    {
        return $this->dhuhr;
    }

    /**
     * @param string $dhuhr
     * @return PrayerTime
     */
    public function setDhuhr(string $dhuhr): PrayerTime
    {
        $this->dhuhr = $dhuhr;
        return $this;
    }

    /**
     * @return string
     */
    public function getAsr(): string
    {
        return $this->asr;
    }

    /**
     * @param string $asr
     * @return PrayerTime
     */
    public function setAsr(string $asr): PrayerTime
    {
        $this->asr = $asr;
        return $this;
    }

    /**
     * @return string
     */
    public function getSunset(): string
    {
        return $this->sunset;
    }

    /**
     * @param string $sunset
     * @return PrayerTime
     */
    public function setSunset(string $sunset): PrayerTime
    {
        $this->sunset = $sunset;
        return $this;
    }

    /**
     * @return string
     */
    public function getMaghrib(): string
    {
        return $this->maghrib;
    }

    /**
     * @param string $maghribb
     * @return PrayerTime
     */
    public function setMaghrib(string $maghrib): PrayerTime
    {
        $this->maghrib = $maghrib;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsha(): string
    {
        return $this->isha;
    }

    /**
     * @param string $isha
     * @return PrayerTime
     */
    public function setIsha(string $isha): PrayerTime
    {
        $this->isha = $isha;
        return $this;
    }

    /**
     * @return string
     */
    public function getImsak(): string
    {
        return $this->imsak;
    }

    /**
     * @param string $imsak
     * @return PrayerTime
     */
    public function setImsak(string $imsak): PrayerTime
    {
        $this->imsak = $imsak;
        return $this;
    }

    /**
     * @return string
     */
    public function getMidnight(): string
    {
        return $this->midnight;
    }

    /**
     * @param string $midnight
     * @return PrayerTime
     */
    public function setMidnight(string $midnight): PrayerTime
    {
        $this->midnight = $midnight;
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
     * @return PrayerTime
     */
    public function setMetadata(array $metadata): PrayerTime
    {
        $this->metadata = $metadata;
        return $this;
    }


}
