<?php


namespace Model;


use App\Model\Currency;
use InvalidArgumentException;
use PHPUnit_Framework_TestCase;

class CurrencyTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function currencyStaticMethodPLNReturnsCurrencyPLN(){

        /** @var Currency $result */
        $result = Currency::pln();

        $this->assertEquals('PLN', "$result");
    }

    /** @test */
    public function currencyStaticMethodEURReturnsCurrencyEUR(){

        /** @var Currency $result */
        $result = Currency::eur();

        $this->assertEquals('EUR', "$result");
    }

    /** @test */
    public function currencyStaticMethodUSDReturnsCurrencyUSD(){

        /** @var Currency $result */
        $result = Currency::usd();

        $this->assertEquals('USD', "$result");
    }

    /**
     * @test
     */
    public function currencyStaticMethodUAHThrowsError()
    {
        $this->expectException(InvalidArgumentException::class);

        /** @var Currency $result */
        Currency::uah();
    }

    /**
     * @test
     */
    public function currencyStaticMethodGBPThrowsError()
    {
        $this->expectException(InvalidArgumentException::class);

        /** @var Currency $result */
        Currency::gbp();
    }

}
