<?php


namespace App\Strategies;


class RoundUpStrategy implements RoundStrategy
{

    public function __construct()
    {
    }

    public function round($amount)
    {
        $amount = ceil($amount*100)/100;

        return round($amount, 2, PHP_ROUND_HALF_UP);
    }
}