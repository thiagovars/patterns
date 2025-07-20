<?php

namespace Internal\Strategy;

use Internal\Contracts\TaxContract;

class ICMS implements TaxContract
{
    public function calculate(float $amount): float
    {
        return $amount * 0.18;
    }
}