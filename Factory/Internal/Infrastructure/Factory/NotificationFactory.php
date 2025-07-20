<?php

namespace Internal\Infrastructure\Factory;

use Internal\Infrastructure\Products\EmailNotification;
use Internal\Infrastructure\Products\SMSNotification;
use Internal\Infrastructure\Products\PushNotification;
use Internal\Contracts\Notification;

class NotificationFactory
{
    public static function make(string $type): Notification
    {
        return match($type) {
            'email' => new EmailNotification(),
            'sms' => new SMSNotification(),
            'push' => new PushNotification(),
        };
    }
    
}