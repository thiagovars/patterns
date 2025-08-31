# Abstract Factory Pattern - Example Project

This project demonstrates the implementation of the **Abstract Factory** design pattern in PHP. It includes examples of abstract and concrete factories for graphical user interfaces (GUI) on different platforms (Desktop and Web).

## Prerequisites

- PHP 8.0 or higher
- Composer installed (for dependency management)

## Project Setup

1. Clone this repository or download the source code.
2. Navigate to the project directory:
   ```bash
   cd /Users/thiagovars/Public/patterns/Abstract Factory
   ```
3. Install project dependencies using Composer:
   ```bash
   composer install
   ```

## Running the Project

The project includes a main script located at `Internal/Application/Cmd/main.php`. To run it, use the following command:

```bash
php Internal/Application/Cmd/main.php
```

This will execute the Abstract Factory pattern example, creating and displaying GUI components (buttons and text boxes) for Desktop and Web platforms.

## Project Structure

- `Internal/Application/Contracts/`: Contains interfaces for GUI components (`ButtonInterface.php`, `TextBoxInterface.php`) and the abstract factory (`GUIFactory.php`).
- `Internal/Infrastructure/Components/`: Concrete implementations of GUI components for Desktop and Web.
- `Internal/Infrastructure/Factory/`: Concrete implementations of factories for Desktop and Web, as well as a factory that follows the Dependency Inversion Principle (DIP).

## Contribution

Feel free to contribute improvements or fixes. Open an issue or submit a pull request.

## License

This project is licensed under the MIT License. See the `LICENSE` file for details.
