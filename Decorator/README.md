# Decorator Pattern in PHP

This project demonstrates the implementation of the Decorator pattern in PHP. The Decorator is a structural design pattern that allows adding behaviors to individual objects dynamically, without affecting the behavior of other objects from the same class.

## Project Structure

The project is organized as follows:

- `Cmd/main.php`: Main file to run the example.
- `Internal/Application/Notification/Service/`: Contains notification classes (Email, Slack, SMS) and the Decorator.
- `Internal/Domain/Notification/Entity/`: Contains the base notifier class.

## How to Run

1. Ensure you have PHP installed on your machine (version 7.4 or higher).
2. Install project dependencies using Composer:
   ```bash
   composer install
   ```
3. Run the main file to see the example in action:
   ```bash
   php Cmd/main.php
   ```

## Usage Example

The example demonstrates how to add extra functionalities (such as Slack or SMS notifications) to a base notifier (Email) using the Decorator pattern.

### Example Code

```php
<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Internal\Domain\Notification\Entity\BaseNotifier;
use Internal\Application\Notification\Service\EmailNotifier;
use Internal\Application\Notification\Service\SlackNotifier;
use Internal\Application\Notification\Service\SMSNotifier;
use Internal\Application\Notification\Service\NotifierDecorator;

$base = new BaseNotifier();
$notifier = new EmailNotifier($base);
echo $notifier->send("Original message sent via Email.") . "\n";

// Decorator for Slack
$slackNotifier = new SlackNotifier($notifier);
echo $slackNotifier->send("Message sent via Email and Slack.") . "\n";

// Decorator for SMS
$smsNotifier = new SMSNotifier($slackNotifier);
echo $smsNotifier->send("Message sent via Email, Slack, and SMS.") . "\n";
?>
```

### Expected Output

```
Email: Original message sent via Email.
Slack: Message sent via Email and Slack.
SMS: Message sent via Email, Slack, and SMS.
```

## Benefits of the Decorator Pattern

- **Flexibility**: Allows adding or removing behaviors at runtime.
- **Extensibility**: Avoids subclass explosion for behavior combinations.
- **Single Responsibility Principle**: Breaks functionalities into smaller, focused classes.

## Contribution

Feel free to contribute with improvements or fixes. Just open an issue or submit a pull request.

## License

This project is licensed under the MIT License. See the `LICENSE` file for details.
