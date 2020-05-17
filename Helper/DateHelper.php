<?php


namespace Abulh\Helper;


class DateHelper
{

    public static function convert12HrsTo24HrsFormat(string $time)
    {
        return date("H:i", strtotime("1:30 PM"));
    }
}
