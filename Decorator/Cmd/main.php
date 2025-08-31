<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Internal\Domain\Notification\Entity\BaseNotifier;
use Internal\Application\Notification\Service\EmailNotifier;
use Internal\Application\Notification\Service\SMSNotifier;
use Internal\Application\Notification\Service\SlackNotifier;

$base = new BaseNotifier();
$notifier = new SlackNotifier(
    new SMSNotifier(
        new EmailNotifier($base)
    )
);

$notifier->notify("This message will be sent to all channels created at this moment.");
echo "================================\n";

$notifier = new SlackNotifier($base);
$notifier->notify("This message will be sent only on slack.");
echo "================================\n";

$notifier = new EmailNotifier(
    new SMSNotifier($base)
);
$notifier->notify("This message will be sent only on email and sms.");