<?php

namespace Internal\UseCase;

use Application\Domain\UseCase\UseCase;
use Internal\Contracts\TaxContract;

class CalculateTaxUseCase implements UseCase
{
    public function __construct(
        private TaxContract $taxStrategy
    ) {}

    public function execute(array $data): mixed
    {
        return $this->taxStrategy->calculate($data['amount']);
    }
}