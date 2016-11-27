<?php


namespace tests;


use App\Strategies\RoundUpStrategy;
use PHPUnit_Framework_TestCase;

class RoundUpStrategyTest extends PHPUnit_Framework_TestCase
{
    /** @var  RoundUpStrategy roundDownStrategy */
    private $roundUpStrategy;

    protected function setUp()
    {
        parent::setUp();
        $this->roundUpStrategy = new RoundUpStrategy();
    }

    /** @test */
    public function roundUpStrategyReturnsRoundDown() {

        $result = $this->roundUpStrategy->round(49.955);

        $this->assertEquals(49.96, $result);
    }
}