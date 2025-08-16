<?php

namespace Internal\Application\Domain\Entities;

class Order
{
    public function __construct(
        public int $id,
        public string $status,
        public int $total,
    ) {}

    public function changeStatus(string $status): void
    {
        $this->status = $status;
    }

    public function status(): string
    {
        return $this->status;
    }
}