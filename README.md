# Design Patterns Study Collection

A comprehensive collection of simple PHP projects focused on studying and implementing various design patterns. Each project demonstrates a specific pattern with practical, focused examples that showcase the pattern's solution and usage.

## Overview

This repository contains isolated projects that serve as learning resources for understanding design patterns in PHP. Each pattern is implemented in a self-contained project with clear examples and practical use cases.

## Patterns Included

### 🎯 Strategy Pattern
**Location**: `Strategy/`
- **Purpose**: Demonstrates how to implement different algorithms (tax calculations) that can be swapped at runtime
- **Key Features**: 
  - ICMS, IPI, and ISS tax calculation strategies
  - Clean separation of tax calculation logic
  - Easy to add new tax types without modifying existing code

### 🏭 Factory Pattern
**Location**: `Factory/`
- **Purpose**: Shows how to create objects without specifying their exact classes
- **Key Features**:
  - Notification system with different types (email, SMS, push)
  - Centralized object creation logic
  - Easy to extend with new notification types

### 🏗️ Abstract Factory Pattern
**Location**: `Abstract Factory/`
- **Purpose**: Demonstrates creating families of related objects (GUI components)
- **Key Features**:
  - Desktop and Web GUI component families
  - Buttons and text boxes for different platforms
  - Dependency injection implementation

### 🔨 Builder Pattern
**Location**: `Builder/`
- **Purpose**: Shows step-by-step construction of complex objects (reports)
- **Key Features**:
  - Report generation with different builders
  - Text-based report building
  - Flexible report structure creation

### 🎭 Facade Pattern
**Location**: `Facade/`
- **Purpose**: Provides a simplified interface to complex subsystems (file conversion)
- **Key Features**:
  - Document conversion system (TXT, HTML, Markdown to DOCX/PDF)
  - Simplified API for complex conversion operations
  - Multiple format support with unified interface

## Project Structure

Each pattern follows a consistent structure:
```
PatternName/
├── Internal/
│   ├── Application/     # Main application logic
│   ├── Contracts/       # Interfaces and contracts
│   ├── Infrastructure/  # Concrete implementations
│   └── [Pattern-specific folders]
├── vendor/              # Composer dependencies
├── composer.json        # PHP dependencies
└── [Additional files]
```

## Getting Started

### Prerequisites
- PHP 7.4 or higher
- Composer

### Installation
Each pattern is self-contained. Navigate to any pattern directory and install dependencies:

```bash
cd Strategy/
composer install
```

### Running Examples
Most patterns include executable examples:

```bash
# Strategy Pattern
cd Strategy/
php index.php

# Factory Pattern
cd Factory/
php Internal/Application/index.php

# Abstract Factory Pattern
cd Abstract\ Factory/
php Internal/Application/Cmd/main.php

# Builder Pattern
cd Builder/
php Internal/Application/Cmd/main.php

# Facade Pattern
cd Facade/
php converter_arquivo_docx.php input.txt TXT output.docx
```

## Learning Approach

Each project is designed to be:
- **Focused**: Concentrates on one specific pattern
- **Practical**: Provides real-world use cases
- **Simple**: Avoids unnecessary complexity
- **Educational**: Clear examples that demonstrate the pattern's benefits

## License

This project is open source and available under the [MIT License](LICENSE).