<?php


namespace tests;

use App\Model\AmountWithCurrency;
use App\Model\Currency;
use App\Model\CurrencyCalculator;
use App\Service\ConverterService;
use App\Strategies\RoundUpStrategy;
use Mockery;
use PHPUnit_Framework_TestCase;
use App\Strategies\RoundDownStrategy;

class CurrencyCalculatorTest extends PHPUnit_Framework_TestCase
{
    private $sourceCurrency;
    private $sourceAmountWidthCurrency;
    private $destinationCurrency;
    private $roundStrategy;

    protected function setUp()
    {
        parent::setUp();

        $this->sourceCurrency = Currency::usd();
        $this->destinationCurrency = Currency::pln();
    }

    protected function tearDown()
    {
        parent::tearDown();
        Mockery::close();
    }

    /** @test */
    public function calculateCurrencyReturnsCalculatedAmountToUp()
    {

        $mockService = Mockery::mock('ConverterService');
        $mockService
            ->shouldReceive('convert')
            ->once()
            ->andReturn(4.172);

        $currencyCalculator = new CurrencyCalculator($mockService);
        $this->roundStrategy = new RoundUpStrategy();
        $this->sourceAmountWidthCurrency = new AmountWithCurrency(
            100.011,
            $this->sourceCurrency
        );

        $result = $currencyCalculator->calculate(
            $this->sourceAmountWidthCurrency,
            $this->destinationCurrency,
            $this->roundStrategy
        );

        $this->assertEquals(417.25, $result);
    }

    /** @test */
    public function calculateCurrencyReturnsCalculatedAmountToDown()
    {
        $mockService = Mockery::mock('ConverterService');
        $mockService
            ->shouldReceive('convert')
            ->once()
            ->andReturn(4.172);

        $currencyCalculator = new CurrencyCalculator($mockService);
        $this->roundStrategy = new RoundDownStrategy();
        $this->sourceAmountWidthCurrency = new AmountWithCurrency(
            100.01,
            $this->sourceCurrency
        );

        $result = $currencyCalculator->calculate(
            $this->sourceAmountWidthCurrency,
            $this->destinationCurrency,
            $this->roundStrategy
        );

        $this->assertEquals(417.24, $result);
    }


}
