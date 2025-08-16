# Observer Pattern Implementation in PHP

A comprehensive study and implementation of the Observer design pattern in PHP, demonstrating how to implement a notification system for order status changes.

## 🎯 What is this project?

This project implements the **Observer pattern**, a behavioral design pattern that defines a one-to-many dependency between objects. When one object (the Subject) changes its state, all its dependents (Observers) are notified and updated automatically.

The implementation demonstrates a real-world scenario where order status changes trigger notifications to various observers (like email notifications, stock updates, etc.).

## 📁📂 Project Structure

```
Observer/
├── Cmd/
│   └── main/
│       └── index.php          # Main execution file with demo
├── Internal/
│   ├── Application/
│   │   ├── Domain/
│   │   │   ├── Entities/
│   │   │   │   └── Order.php  # Order entity
│   │   │   ├── Event/
│   │   │   │   └── EventInterface.php  # Event contract
│   │   │   └── Observer/
│   │   │       ├── Observer.php        # Observer interface
│   │   │       └── Subject.php         # Subject interface
│   │   ├── Notifier/
│   │   │   ├── OrderNotifier.php       # Order notification subject
│   │   │   └── StockNotifier.php       # Stock notification subject
│   │   └── Usecase/
│   │       └── OrderStatusChange.php   # Order status change use case
│   └── Infrastructure/
│       └── Notification/
│           └── EmailNotifier.php       # Email notification observer
├── composer.json                        # PHP dependencies
└── README.md                           # This file
```

## 🚀 How to run the project

### Prerequisites

- PHP 8.0 or higher
- Composer (PHP package manager)

### Installation

1. **Clone or download the project**
   ```bash
   git clone <repository-url>
   cd Observer
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Run the demo**
   ```bash
   # Option 1: Using composer script
   composer start
   
   # Option 2: Direct PHP execution
   php Cmd/main/index.php
   ```

### Expected Output

When you run the project, you should see output similar to:

```
=========================================
| ESTUDO PATTERN OBSERVER EM PHP           |
=========================================
|                                       |
| PREMISSAS DO PADRÃO OBSERVER:         |
|                                       |
| • Subject (Observado):                |
|   - Mantém lista de observadores      |
|   - Notifica observadores sobre       |
|     mudanças de estado                |
|                                       |
| • Observer (Observador):              |
|   - Interface para atualizações       |
|   - Recebe notificações do Subject    |
|                                       |
| • Acoplamento baixo entre objetos     |
| • Comunicação via notificações        |
| • Padrão comportamental               |
|                                       |
=========================================

Iniciando demonstração do padrão Observer...
Email notifier sent to customer: paid
```

## 🧠 How the Observer Pattern works here

### Core Components

1. **Subject (Observado)**
   - `OrderNotifier` and `StockNotifier` implement the `Subject` interface
   - Maintain a list of observers
   - Notify all observers when state changes occur

2. **Observer (Observador)**
   - `EmailNotifier` implements the `Observer` interface
   - Receives notifications from subjects
   - Reacts to state changes (e.g., sends emails)

3. **Event System**
   - `EventInterface` defines the contract for events
   - `OrderStatusChange` implements events for order status changes

### Flow Example

1. An `Order` object is created with status "pending"
2. `OrderNotifier` (Subject) is attached with `EmailNotifier` (Observer)
3. When `OrderStatusChange::execute()` is called:
   - Order status changes to "paid"
   - `OrderNotifier` notifies all attached observers
   - `EmailNotifier` receives the notification and "sends" an email

## 📚 Key Benefits of this Implementation

- **Low Coupling**: Subjects and observers are loosely coupled
- **Extensibility**: Easy to add new observers without modifying existing code
- **Reusability**: Observer pattern can be applied to different scenarios
- **Maintainability**: Clear separation of concerns between notification logic and business logic

## 🔧 Extending the Project

To add new observers:

1. Create a new class implementing the `Observer` interface
2. Implement the `update()` method
3. Attach it to a subject using `attach()`

Example:
```php
class SMSNotifier implements Observer
{
    public function update(EventInterface $event): void
    {
        echo "SMS sent: Order {$event->order()->id} status changed to {$event->order()->status}\n";
    }
}

// Attach to OrderNotifier
$orderNotifier->attach(new SMSNotifier());
```

## 📝 License

This project is licensed under the MIT License.

## 📝 Contributing

Feel free to contribute by:
- Adding new observer implementations
- Improving the event system
- Adding more comprehensive tests
- Enhancing documentation

---

**Note**: This is a study project demonstrating the Observer pattern. In production environments, consider using established event systems like Symfony EventDispatcher or Laravel Events.
