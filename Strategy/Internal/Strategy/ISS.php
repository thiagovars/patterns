<?php

namespace Internal\Strategy;

use Internal\Contracts\TaxContract;

class ISS implements TaxContract
{
    public function calculate(float $amount): float
    {
        return $amount * 0.05;
    }
}