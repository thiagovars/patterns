<?php

namespace Internal\Domain\Notification;

interface Notifier
{
    public function notify(string $message): void;
}