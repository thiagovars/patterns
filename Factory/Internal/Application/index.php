<?php

require_once __DIR__ . '../../../vendor/autoload.php';

use Internal\Infrastructure\Factory\NotificationFactory;

echo "--------------------------------\n";
echo "|  Notificação de teste        |\n";
echo "--------------------------------\n";

$notification = NotificationFactory::make('email');
$notification->send('Teste de notificação');
echo "\n";

$notification = NotificationFactory::make('sms');
$notification->send('Teste de notificação');
echo "\n";

$notification = NotificationFactory::make('push');
$notification->send('Teste de notificação');
echo "\n";