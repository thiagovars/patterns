<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Internal\Application\Usecase\OrderStatusChange;
use Internal\Application\Notifier\OrderNotifier;
use Internal\Application\Domain\Entities\Order;
use Internal\Infrastructure\Notification\EmailNotifier;

/**
 * Padrão Observer - Estudo e Implementação
 * 
 * O padrão Observer define uma dependência um-para-muitos entre objetos,
 * de modo que quando um objeto muda de estado, todos os seus dependentes
 * são notificados e atualizados automaticamente.
 */

function exibirCabecalho() {
    echo "\n";
    echo "=========================================\n";
    echo "| ESTUDO PATTERN OBSERVER EM PHP           |\n";
    echo "=========================================\n";
    echo "|                                       |\n";
    echo "| PREMISSAS DO PADRÃO OBSERVER:         |\n";
    echo "|                                       |\n";
    echo "| • Subject (Observado):                |\n";
    echo "|   - Mantém lista de observadores      |\n";
    echo "|   - Notifica observadores sobre       |\n";
    echo "|     mudanças de estado                |\n";
    echo "|                                       |\n";
    echo "| • Observer (Observador):              |\n";
    echo "|   - Interface para atualizações       |\n";
    echo "|   - Recebe notificações do Subject    |\n";
    echo "|                                       |\n";
    echo "| • Acoplamento baixo entre objetos     |\n";
    echo "| • Comunicação via notificações        |\n";
    echo "| • Padrão comportamental               |\n";
    echo "|                                       |\n";
    echo "=========================================\n";
    echo "\n";
}

// Exibir o cabeçalho
exibirCabecalho();

echo "Iniciando demonstração do padrão Observer...\n";

$order = new Order(1, "pending", 100);
$orderNotifier = new OrderNotifier();
$orderNotifier->attach(new EmailNotifier());
$orderStatusChange = new OrderStatusChange($order, $orderNotifier);

$orderStatusChange->execute($order, "paid");

