<?php

namespace Abulh\Service;

use Abulh\Entity\Calender;
use Abulh\Transformer\PrayerTimeResponseTransformer;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

class PrayerTiming
{
    const API_BASE_URL = 'http://api.aladhan.com/v1/';

    const SHIA_ITHNA_ANSARI_METHOD = 0;
    const UNIVERSITY_OF_ISLAMIC_SCIENCES_KARACHI_METHOD = 1;
    const ISLAMIC_SOCIETY_OF_NORTH_AMERICA_METHOD = 2;
    const MUSLIM_WORLD_LEAGUE_METHOD = 3;
    const UMM_AL_QURA_UNIVERSITY_MAKKAH_METHOD = 4;
    const EGYPTIAN_GENERAL_AUTHORITY_OF_SURVEY_METHOD = 5;
    const INSTITUTE_OF_GEOPHYSICS_UNIVERSITY_OF_TEHRAN_METHOD = 7;
    const GULF_REGION_METHOD = 8;
    const KUWAIT_METHOD = 9;
    const QATAR_METHOD = 10;
    const MAJLIS_UGAMA_ISLAM_SINGAPURA_SINGAPORE_METHOD = 11;
    const UNION_ORGANIZATION_ISLAMIC_DE_FRANCE_METHOD = 12;
    const DIYANET_ISLERI_BASKANLIGI_TURKEY_METHOD = 13;
    const CUSTOM_METHOD = 14;
    const SPIRITUAL_ADMINISTRATION_OF_MUSLIMS_OF_RUSSIA_METHOD = 99;

    const HANFI_SCHOOL = 1;
    const SHAFI_SCHOOL = 0;

    const STANDARD_MIDNIGHT_MODE = 0;
    const JAFARI_MIDNIGHT_MODE = 1;

    const MIDDLE_OF_THE_NIGHT_LATITUDE_ADJUSTMENT_METHOD = 1;
    const ONE_SEVENTH_LATITUDE_ADJUSTMENT_METHOD = 2;
    const ANGLE_BASED_LATITUDE_ADJUSTMENT_METHOD = 3;

    const ALLOWED_OPTIONS = [
        'method',
        'tune',
        'school',
        'midnightMode',
        'timezonestring',
        'latitudeAdjustmentMethod',
        'adjustment',
    ];


    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var PrayerTimeResponseTransformer
     */
    private $transformer;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
        $this->transformer = new PrayerTimeResponseTransformer();
    }

    /**
     * @param float $lat
     * @param float $long
     * @param int $month
     * @param int $year
     * @param array $options
     * @return Calender
     * @throws \Exception
     */
    public function getPrayerTimeForMonthForLatLong(
        float $lat,
        float $long,
        int $month,
        int $year,
        array $options = []
    )
    {
        $this->validateOption($options);
        return $this->request(self::API_BASE_URL . 'calender', array_merge([
                'lat' => $lat,
                'long' => $long,
                'month' => $month,
                'year' => $year,
            ], $options));

    }

    /**
     * @param float $lat
     * @param float $long
     * @param int $year
     * @param array $options
     * @return Calender
     * @throws \Exception
     */
    public function getAnnualPrayerTimeForLatLong(
        float $lat,
        float $long,
        int $year,
        array $options = []
    )
    {
        $this->validateOption($options);
        return $this->request(self::API_BASE_URL . 'calender', array_merge([
                'lat' => $lat,
                'long' => $long,
                'year' => $year,
                'annual' => true,
            ], $options));
    }

    /**
     * @param string $address
     * @param int $month
     * @param int $year
     * @param array $options
     * @return Calender
     * @throws \Exception
     */
    public function getPrayerTimeForMonthForAddress(
        string $address,
        int $month,
        int $year,
        array $options = []
    )
    {
        $this->validateOption($options);
        return $this->request(self::API_BASE_URL . 'calendarByAddress',array_merge([
                'address' => $address,
                'month' => $month,
                'year' => $year,
            ], $options));
    }

    /**
     * @param string $address
     * @param int $year
     * @param array $options
     * @return Calender
     * @throws \Exception
     */
    public function getAnnualPrayerTimeForAddress(
        string $address,
        int $year,
        array $options = []
    )
    {
        $this->validateOption($options);
        return $this->request(self::API_BASE_URL . 'calendarByAddress', array_merge([
            'address' => $address,
            'year' => $year,
            'annual' => true,
        ], $options));
    }

    /**
     * @param string $city
     * @param int $month
     * @param int $year
     * @param array $options
     * @return Calender
     * @throws \Exception
     */
    public function getPrayerTimeForMonthByCity(
        string $city,
        int $month,
        int $year,
        array $options = []
    )
    {
        $this->validateOption($options);
        return $this->request(self::API_BASE_URL . 'calendarByCity', array_merge([
            'city' => $city,
            'month' => $month,
            'year' => $year,
        ], $options));
    }

    /**
     * @param string $city
     * @param int $year
     * @param array $options
     * @return Calender
     * @throws \Exception
     */
    public function getAnnualPrayerTimeByCity(
        string $city,
        int $year,
        array $options = []
    )
    {
        $this->validateOption($options);
        return $this->request(self::API_BASE_URL . 'calendarByCity', array_merge([
            'city' => $city,
            'annual' => true,
            'year' => $year,
        ], $options));
    }

    /**
     * @param float $lat
     * @param float $long
     * @param int $month
     * @param int $year
     * @param array $options
     * @return Calender
     * @throws \Exception
     */
    public function getPrayerTimeForMonthForLatLongBasedOnHijriCalender(
        float $lat,
        float $long,
        int $month,
        int $year,
        array $options = []
    )
    {
        $this->validateOption($options);
        return $this->request(self::API_BASE_URL . 'hijriCalender', array_merge([
            'lat' => $lat,
            'long' => $long,
            'month' => $month,
            'year' => $year,
        ], $options));

    }

    /**
     * @param float $lat
     * @param float $long
     * @param int $year
     * @param array $options
     * @return Calender
     * @throws \Exception
     */
    public function getAnnualPrayerTimeForLatLongBasedOnHijriCalender(
        float $lat,
        float $long,
        int $year,
        array $options = []
    )
    {
        $this->validateOption($options);
        return $this->request(self::API_BASE_URL . 'hijriCalender', array_merge([
            'lat' => $lat,
            'long' => $long,
            'year' => $year,
            'annual' => true,
        ], $options));
    }

    /**
     * @param string $address
     * @param int $month
     * @param int $year
     * @param array $options
     * @return Calender
     * @throws \Exception
     */
    public function getPrayerTimeForMonthForAddressBasedOnHijriCalender(
        string $address,
        int $month,
        int $year,
        array $options = []
    )
    {
        $this->validateOption($options);
        return $this->request(self::API_BASE_URL . 'hijriCalendarByAddress',array_merge([
            'address' => $address,
            'month' => $month,
            'year' => $year,
        ], $options));
    }

    /**
     * @param string $address
     * @param int $year
     * @param array $options
     * @return Calender
     * @throws \Exception
     */
    public function getAnnualPrayerTimeForAddressBasedOnHijriCalender(
        string $address,
        int $year,
        array $options = []
    )
    {
        $this->validateOption($options);
        return $this->request(self::API_BASE_URL . 'hijriCalendarByAddress', array_merge([
            'address' => $address,
            'year' => $year,
            'annual' => true,
        ], $options));
    }

    /**
     * @param string $city
     * @param int $month
     * @param int $year
     * @param array $options
     * @return Calender
     * @throws \Exception
     */
    public function getPrayerTimeForMonthByCityBasedOnHijriCalender(
        string $city,
        int $month,
        int $year,
        array $options = []
    )
    {
        $this->validateOption($options);
        return $this->request(self::API_BASE_URL . 'hijriCalendarByCity', array_merge([
            'city' => $city,
            'month' => $month,
            'year' => $year,
        ], $options));
    }

    /**
     * @param string $city
     * @param int $year
     * @param array $options
     * @return Calender
     * @throws \Exception
     */
    public function getAnnualPrayerTimeByCityBasedOnHijriCalender(
        string $city,
        int $year,
        array $options = []
    )
    {
        $this->validateOption($options);
        return $this->request(self::API_BASE_URL . 'hijriCalendarByCity', array_merge([
            'city' => $city,
            'annual' => true,
            'year' => $year,
        ], $options));

    }

    /**
     * @param string $url
     * @param array $queryOptions
     * @return Calender
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function request(string $url, array $queryOptions)
    {
        $response = $this->client->request('GET', $url, [
            'query' => array_merge($queryOptions, [
                'method' => self::UMM_AL_QURA_UNIVERSITY_MAKKAH_METHOD,
                'tune' => '0,0,0,0,0',
                'school' => self::HANFI_SCHOOL,
                'midnightMode' => self::STANDARD_MIDNIGHT_MODE,
                'timezonestring' => 'Europe/London',
                'latitudeAdjustmentMethod' => self::MIDDLE_OF_THE_NIGHT_LATITUDE_ADJUSTMENT_METHOD,
                'adjustment' => 0,
            ])
        ]);

        return $this->validateAndTransformResult($response);
    }

    /**
     * @param array $options
     * @return bool
     * @throws \Exception
     */
    protected function validateOption(array $options)
    {
        if (!empty(array_diff(array_keys($options), self::ALLOWED_OPTIONS))) {
            throw new \Exception("Invalid option given. Only the following options are supported");
        }
        return true;
    }

    /**
     * @param ResponseInterface $response
     * @return Calender
     * @throws \Exception
     */
    protected function validateAndTransformResult(ResponseInterface $response)
    {
        if ($response->getStatusCode() == 200) {
            $transformed = $this->_transformResponseToJsonArray($response);
            if (!empty($transformed) && array_key_exists('status', $transformed) && $transformed['status'] === 'OK') {
                return $this->transformer->transform($transformed);
            }
        }

        throw new \Exception($response->getReasonPhrase());
    }

    /**
     * @param ResponseInterface $response
     * @return array
     */
    private function _transformResponseToJsonArray(ResponseInterface $response)
    {
        return json_decode($response->getBody()->getContents(), true);
    }
}
