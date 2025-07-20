# Padrão Factory - Exemplo PHP 8.4

Este projeto demonstra a implementação do padrão de design Factory usando PHP 8.4 com estrutura PSR-4.

## Estrutura do Projeto

```
Factory/
├── src/
│   ├── Contracts/
│   │   └── ProductInterface.php
│   ├── Factory/
│   │   └── ProductFactory.php
│   ├── Products/
│   │   ├── ConcreteProductA.php
│   │   └── ConcreteProductB.php
│   └── UseCase/
│       └── CreateProductUseCase.php
├── tests/
│   └── Unit/
│       ├── ProductFactoryTest.php
│       └── CreateProductUseCaseTest.php
├── composer.json
├── phpunit.xml
├── phpstan.neon
├── phpcs.xml
├── example.php
└── README.md
```

## Requisitos

- PHP 8.4 ou superior
- Composer

## Instalação

1. Clone o repositório
2. Execute o comando para instalar as dependências:

```bash
composer install
```

## Como Usar

### Executar o exemplo

```bash
php example.php
```

### Executar testes

```bash
# Executar todos os testes
composer test

# Executar testes com cobertura
composer test-coverage
```

### Análise de código

```bash
# Análise estática com PHPStan
composer phpstan

# Verificar padrões de código
composer cs

# Corrigir padrões de código automaticamente
composer cs-fix
```

## Padrão Factory Implementado

O padrão Factory é usado para criar objetos sem especificar suas classes concretas. Neste exemplo:

### Interface Base
- `ProductInterface`: Define o contrato que todos os produtos devem implementar

### Produtos Concretos
- `ConcreteProductA`: Implementação específica do produto A
- `ConcreteProductB`: Implementação específica do produto B

### Factory
- `ProductFactory`: Responsável por criar instâncias dos produtos baseado em parâmetros

### Caso de Uso
- `CreateProductUseCase`: Demonstra como usar a factory em um contexto de aplicação

## Características do Projeto

- **PSR-4 Autoloading**: Estrutura de namespaces seguindo PSR-4
- **PHP 8.4**: Utiliza recursos modernos como match expressions, readonly properties
- **Testes Unitários**: Cobertura completa com PHPUnit
- **Análise Estática**: Configuração do PHPStan para detecção de erros
- **Padrões de Código**: PHP CodeSniffer configurado para PSR-12
- **Type Safety**: Uso de strict types e type hints

## Benefícios do Padrão Factory

1. **Encapsulamento**: A lógica de criação está isolada
2. **Flexibilidade**: Fácil adição de novos tipos de produtos
3. **Manutenibilidade**: Mudanças na criação não afetam o código cliente
4. **Testabilidade**: Fácil mock e teste das dependências 