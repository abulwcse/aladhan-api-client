<?php

namespace Abulh\Entity;

class HijriiDate
{
    /**
     * @var string
     */
    private $date;

    /**
     * @var int
     */
    private $dayOfMonth;

    /**
     * @var string
     */
    private $weekDayInEnglish;

    /**
     * @var string
     */
    private $weekDayInArabic;

    /**
     * @var int
     */
    private $monthInNumber;

    /**
     * @var string
     */
    private $monthInEnglish;

    /**
     * @var string
     */
    private $monthInArabic;

    /**
     * @var int
     */
    private $year;

    /**
     * @var string
     */
    private $designation;

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return HijriiDate
     */
    public function setDate(string $date): HijriiDate
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return int
     */
    public function getDayOfMonth(): int
    {
        return $this->dayOfMonth;
    }

    /**
     * @param int $dayOfMonth
     * @return HijriiDate
     */
    public function setDayOfMonth(int $dayOfMonth): HijriiDate
    {
        $this->dayOfMonth = $dayOfMonth;
        return $this;
    }

    /**
     * @return string
     */
    public function getWeekDayInEnglish(): string
    {
        return $this->weekDayInEnglish;
    }

    /**
     * @param string $weekDayInEnglish
     * @return HijriiDate
     */
    public function setWeekDayInEnglish(string $weekDayInEnglish): HijriiDate
    {
        $this->weekDayInEnglish = $weekDayInEnglish;
        return $this;
    }

    /**
     * @return string
     */
    public function getWeekDayInArabic(): string
    {
        return $this->weekDayInArabic;
    }

    /**
     * @param string $weekDayInArabic
     * @return HijriiDate
     */
    public function setWeekDayInArabic(string $weekDayInArabic): HijriiDate
    {
        $this->weekDayInArabic = $weekDayInArabic;
        return $this;
    }

    /**
     * @return int
     */
    public function getMonthInNumber(): int
    {
        return $this->monthInNumber;
    }

    /**
     * @param int $monthInNumber
     * @return HijriiDate
     */
    public function setMonthInNumber(int $monthInNumber): HijriiDate
    {
        $this->monthInNumber = $monthInNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getMonthInEnglish(): string
    {
        return $this->monthInEnglish;
    }

    /**
     * @param string $monthInEnglish
     * @return HijriiDate
     */
    public function setMonthInEnglish(string $monthInEnglish): HijriiDate
    {
        $this->monthInEnglish = $monthInEnglish;
        return $this;
    }

    /**
     * @return string
     */
    public function getMonthInArabic(): string
    {
        return $this->monthInArabic;
    }

    /**
     * @param string $monthInArabic
     * @return HijriiDate
     */
    public function setMonthInArabic(string $monthInArabic): HijriiDate
    {
        $this->monthInArabic = $monthInArabic;
        return $this;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     * @return HijriiDate
     */
    public function setYear(int $year): HijriiDate
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return string
     */
    public function getDesignation(): string
    {
        return $this->designation;
    }

    /**
     * @param string $designation
     * @return HijriiDate
     */
    public function setDesignation(string $designation): HijriiDate
    {
        $this->designation = $designation;
        return $this;
    }

}
