<?php


namespace App\Strategies;


use App\Strategies\RoundStrategy;

class RoundDownStrategy implements RoundStrategy
{

    public function round($amount)
    {
        $amount = floor($amount*100)/100;
        return round($amount, 2, PHP_ROUND_HALF_DOWN);
    }
}