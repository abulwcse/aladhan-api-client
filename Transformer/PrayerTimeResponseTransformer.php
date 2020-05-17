<?php


namespace Abulh\Transformer;

use Abulh\Entity\HijriiDate;
use Abulh\Entity\Metadata\SplDate;
use Abulh\Entity\PrayerTime;
use DateTime;

class PrayerTimeResponseTransformer
{

    public function transform(array $response)
    {
        $dataToTransform = $response['data'];
        $result = [];
        foreach ($dataToTransform as $data) {
            $timings = $data['timings'];
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
            $dt->setTimestamp($data['date']['timestamp']);
            $prayerTime->setDate($dt);

            $hijriDate = new HijriiDate();
            $hijri = $data['date']['hijri'];
            $hijriDate->setDate($hijri['date'])
                ->setDayOfMonth(intval($hijri['day']))
                ->setWeekDayInArabic($hijri['weekday']['ar'])
                ->setWeekDayInEnglish($hijri['weekday']['en'])
                ->setMonthInNumber(intval($hijri['month']['number']))
                ->setMonthInEnglish($hijri['month']['en'])
                ->setMonthInArabic($hijri['month']['ar'])
                ->setYear(intval($hijri['year']))
                ->setDesignation($hijri['designation']['abbreviated']);

            $prayerTime->setHijriDate($hijriDate);
            $prayerTime->setMetadata($data['meta']);

            $result[] = $prayerTime;
        }

        return $result;
    }

    /**
     * @param $waqt
     * @param $data
     * @return false|string
     */
    private function getFormattedPrayerTime($waqt, $data)
    {
        return substr($data[$waqt], 0, 5);
    }
}
