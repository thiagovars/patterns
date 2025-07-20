<?php

namespace Application\Domain\UseCase;

interface UseCase
{
    public function execute(array $data): mixed;
}