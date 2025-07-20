<?php

namespace Internal\Contracts;

interface TaxContract
{
    public function calculate(float $amount): float;
}