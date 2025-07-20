<?php

namespace Internal\Strategy;

use Internal\Contracts\TaxContract;

class IPI implements TaxContract
{
    // Disclaimer: This kind of tax is not real, it is just for example
    public function calculate(float $amount): float
    {
        return $amount * 0.06;
    }
}