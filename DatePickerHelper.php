<?php


namespace DatePickerHelper;

/**
 *
 * Datepicker date format
 * ---------------
 * http://api.jqueryui.com/datepicker/#utility-formatDate
 *
 *      - d - day of month (no leading zero)
 *      - dd - day of month (two digit)
 *      - o - day of the year (no leading zeros)
 *      - oo - day of the year (three digit)
 *      - D - day name short
 *      - DD - day name long
 *      - m - month of year (no leading zero)
 *      - mm - month of year (two digit)
 *      - M - month name short
 *      - MM - month name long
 *      - y - year (two digit)
 *      - yy - year (four digit)
 *
 *
 *
 *
 * Php date format
 * ---------------
 * http://php.net/manual/fr/function.date.php
 *
 *
 */
class DatePickerHelper
{


    private static $map = [
        "yy" => "<1>",
        "y" => "<2>",
        "MM" => "<3>",
        "M" => "<4>",
        "mm" => "<5>",
        "m" => "<6>",
        "DD" => "<7>",
        "D" => "<8>",
        "oo" => "<9>",
        "o" => "<10>",
        "dd" => "<11>",
        "d" => "<12>",
    ];

    private static $map2 = [
        "<1>" => 'Y',
        "<2>" => 'y',
        "<3>" => 'F',
        "<4>" => 'M',
        "<5>" => 'm',
        "<6>" => 'n',
        "<7>" => 'l',
        "<8>" => 'D',
        "<9>" => 'z', // note: php doesn't have "day of the year with three digits", but this is the closest
        "<10>" => 'z',
        "<11>" => 'd',
        "<12>" => 'j',
    ];


//    private static $naiveMap = [
//        "yy" => "Y",
//        "y" => "y",
//        "MM" => "F",
//        "M" => "M",
//        "mm" => "m",
//        "m" => "n",
//        "DD" => "l",
//        "D" => "D",
//        "oo" => "z", // note: php doesn't have "day of the year with three digits", but this is the closest
//        "o" => "z",
//        "dd" => "d",
//        "d" => "j",
//    ];


    public static function convertFromDatePickerToPhpDate(string $datePickerFormat): string
    {
        $map = self::$map;
        $map2 = self::$map2;
        $first = str_replace(array_keys($map), array_values($map), $datePickerFormat);
        return str_replace(array_keys($map2), array_values($map2), $first);
    }

    public static function convertFromPhpDateToDatePicker(string $phpDate): string
    {
        $map2 = array_flip(self::$map2);
        $map = array_flip(self::$map);
        $first = str_replace(array_keys($map2), array_values($map2), $phpDate);
        return str_replace(array_keys($map), array_values($map), $first);
    }

}