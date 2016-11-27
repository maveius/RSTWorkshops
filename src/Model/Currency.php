<?php


namespace App\Model;
use InvalidArgumentException;

/** @noinspection SingletonFactoryPatternViolationInspection */

/**
 * Class Currency
 * @package App\Model
 *
 * @method static usd()
 * @method static eur()
 * @method static pln()
 */
class Currency
{
    private static $allowedCurrencies = ['USD', 'EUR', 'PLN'];

    /** @var  string $value */
    private $value;

    protected function __construct()
    {
    }

    public static function __callStatic($name, $arguments)
    {
        $array = self::$allowedCurrencies;
        $currencyValue = strtoupper($name);

        if( in_array($currencyValue, $array, $strict = false) ) {
            $currency = new Currency();
            $currency->value = $currencyValue;

            return $currency;
        }

        throw new InvalidArgumentException('InvalidArgumentException: Not allowed currency type');
    }

    public function __toString()
    {
        return $this->value;
    }


}