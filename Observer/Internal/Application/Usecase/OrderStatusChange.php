<?php

namespace Internal\Application\Usecase;

use Internal\Application\Notifier\OrderNotifier;
use Internal\Application\Domain\Entities\Order;
use Internal\Application\Domain\Event\EventInterface;

class OrderStatusChange implements EventInterface
{
    public function name(): string
    {
        return "order.status.change";
    }

    public function __construct(
        private Order $order,
        private OrderNotifier $orderNotifier
    ) {}

    public function execute(Order $order, string $status): void
    {
        $order->changeStatus($status);
        $this->orderNotifier->notify($this);
    }

    public function order(): Order
    {
        return $this->order;
    }
}