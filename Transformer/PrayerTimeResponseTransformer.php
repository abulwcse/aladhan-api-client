<?php


namespace Abulh\Transformer;

use Abulh\Entity\Calender;
use Abulh\Entity\CalenderDay;
use Abulh\Entity\HijriiDate;
use Abulh\Entity\Metadata\SplDate;
use Abulh\Entity\PrayerTime;
use DateTime;

class PrayerTimeResponseTransformer
{
    /**
     * @param array $data
     *
     * @return CalenderDay
     * @throws \Exception
     */
    public function transformDay(array $data)
    {
        $day = new CalenderDay();

        $timings = $data['timings'];
        $date = $data['date'];
        $metadata = $data['meta'];

        $prayerTime = new PrayerTime();
        $prayerTime->setFajr($this->getFormattedPrayerTime('Fajr', $timings))
            ->setSunrise($this->getFormattedPrayerTime('Sunrise', $timings))
            ->setDhuhr($this->getFormattedPrayerTime('Dhuhr', $timings))
            ->setImsak($this->getFormattedPrayerTime('Imsak', $timings))
            ->setAsr($this->getFormattedPrayerTime('Asr', $timings))
            ->setMaghrib($this->getFormattedPrayerTime('Maghrib', $timings))
            ->setIsha($this->getFormattedPrayerTime('Isha', $timings))
            ->setMidnight($this->getFormattedPrayerTime('Midnight', $timings))
            ->setSunset($this->getFormattedPrayerTime('Sunset', $timings));

        $dt = new DateTime();
        $dt->setTimestamp($date['timestamp']);
        $day->setDate($dt);

        $hijriDate = new HijriiDate();
        $hijri = $date['hijri'];
        $hijriDate->setDate($hijri['date'])
            ->setDayOfMonth(intval($hijri['day']))
            ->setWeekDayInArabic($hijri['weekday']['ar'])
            ->setWeekDayInEnglish($hijri['weekday']['en'])
            ->setMonthInNumber(intval($hijri['month']['number']))
            ->setMonthInEnglish($hijri['month']['en'])
            ->setMonthInArabic($hijri['month']['ar'])
            ->setYear(intval($hijri['year']))
            ->setDesignation($hijri['designation']['abbreviated']);

        $day->setHijriDate($hijriDate);
        $day->setMetadata($metadata);

        return $day;
    }

    /**
     * @param array $data
     * @return Calender
     * @throws \Exception
     */
    public function transformMonthData(array $data)
    {
        $calender = new Calender();
        foreach ($data as $datum) {
            $calender->addDay($this->transformDay($datum));
        }

        return $calender;
    }

    /**
     * @param array $data
     * @return Calender
     * @throws \Exception
     */
    public function transformYearData(array $data)
    {
        $calender = new Calender();
        foreach ($data as $datum) {
            $calender->addDays($this->transformMonthData($datum)->getDays());
        }
        return $calender;
    }

    /**
     * @param string $waqt
     * @param array $data
     * @return string
     */
    private function getFormattedPrayerTime(string $waqt, array $data)
    {
        return substr($data[$waqt], 0, 5);
    }
}
