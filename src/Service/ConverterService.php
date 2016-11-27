<?php


namespace App\Service;


use DateTime;

class ConverterService
{

    /**
     * ConverterService constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $sourceCurrency
     * @param $destinationCurrency
     * @param $date
     * @return float
     */
    public function convert($sourceCurrency, $destinationCurrency, $date)
    {
        /** @var DateTime $date */
        $formatedDate = $date->format('Y-m-d');

        $url = "http://api.fixer.io/$formatedDate?base=$sourceCurrency&symbols=$destinationCurrency";
        $result = json_decode(file_get_contents($url), true);

        return $result['rates']["$destinationCurrency"];
    }
}