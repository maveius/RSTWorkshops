<?php


namespace App\Model;


use App\Service\ConverterService;
use App\Strategies\RoundStrategy;
use DateTime;

class CurrencyCalculator
{
    /** @var ConverterService $converterService */
    private $converterService;

    /**
     * CurrencyCalculator constructor.
     * @param ConverterService $converterService
     */
    public function __construct($converterService)
    {
        $this->converterService = $converterService;
    }

    /**
     * @param AmountWithCurrency $sourceAmountWidthCurrency
     * @param Currency $destinationCurrency
     * @param RoundStrategy $roundStrategy
     * @return float
     */
    public function calculate($sourceAmountWidthCurrency, $destinationCurrency, $roundStrategy)
    {
        $amount = $sourceAmountWidthCurrency->getAmount();
        $currency = $sourceAmountWidthCurrency->getCurrency();

        $rate = $this
            ->converterService
            ->convert(
                $currency,
                $destinationCurrency,
                new DateTime()
            );

        return $roundStrategy->round($amount * $rate);
    }
}