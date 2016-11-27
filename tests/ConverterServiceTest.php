<?php


namespace tests;


use App\Model\Currency;
use App\Service\ConverterService;
use DateTime;
use Mockery;
use PHPUnit_Framework_TestCase;

class ConverterServiceTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function converterReturnsCurrencyRatio()
    {
        $mockService = Mockery::mock('ConverterService');
        $mockService
            ->shouldReceive('convert')
            ->once()
            ->andReturn(4.172);

        /** @var ConverterService $mockService */
        $ratio = $mockService->convert(Currency::usd(), Currency::pln(), new DateTime());

        $this->assertEquals(4.172, $ratio);
    }

}
