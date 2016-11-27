<?php


namespace tests;


use App\Strategies\RoundDownStrategy;
use PHPUnit_Framework_TestCase;

class RoundDownStrategyTest extends PHPUnit_Framework_TestCase
{
    /** @var  RoundDownStrategy roundDownStrategy */
    private $roundDownStrategy;

    protected function setUp()
    {
        parent::setUp();
        $this->roundDownStrategy = new RoundDownStrategy();
    }

    /** @test */
    public function roundDownStrategyReturnsRoundDown() {

        $result = $this->roundDownStrategy->round(49.955);

        $this->assertEquals(49.95, $result);
    }
}
