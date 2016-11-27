<?php


namespace App\Model;


class AmountWithCurrency
{

    private $amount;
    private $currency;
    /**
     * AmountWithCurrency constructor.
     * @param float $amount
     * @param Currency $currency
     */
    public function __construct($amount, $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }


}