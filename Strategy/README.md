# Tax Calculator for brasilian financial law

## Padrão Strategy - Estudo de Caso

Este projeto demonstra a implementação do **Padrão Strategy** usando impostos brasileiros como exemplo prático. Cada imposto representa uma estratégia diferente de cálculo, todas implementando a mesma interface `TaxContract`.

### O que é o Padrão Strategy?

O Padrão Strategy permite definir uma família de algoritmos, encapsulá-los e torná-los intercambiáveis. No nosso caso, cada imposto (ICMS, ISS, IPI) é uma estratégia diferente de cálculo que pode ser aplicada dinamicamente.

### Interface TaxContract

Todas as estratégias de impostos implementam a interface `TaxContract` que exige:

```php
interface TaxContract
{
    public function calculate(float $amount): float;
}
```

- **Parâmetro**: `$amount` - valor base para o cálculo
- **Retorno**: `float` - valor do imposto calculado

## Impostos Brasileiros (Estratégias)

### 1. ICMS (Imposto sobre Circulação de Mercadorias e Serviços)
- **Localização**: `internal/strategy/ICMSTax.php`
- **Taxa padrão**: 18% (pode variar por estado e tipo de produto)
- **Base de cálculo**: Valor da mercadoria
- **Fórmula**: `valor * taxa`
- **Observações**: 
  - Taxa varia entre 7% e 25% dependendo do estado
  - Alguns produtos têm alíquotas diferenciadas
  - Pode ter redução de base de cálculo

### 2. ISS (Imposto Sobre Serviços)
- **Localização**: `internal/strategy/ISSTax.php` (a ser criado)
- **Taxa padrão**: 5% (pode variar por município e tipo de serviço)
- **Base de cálculo**: Valor do serviço
- **Fórmula**: `valor * taxa`
- **Observações**:
  - Taxa varia entre 2% e 5% dependendo do município
  - Diferentes tipos de serviço podem ter alíquotas específicas
  - Aplicado apenas em serviços, não em mercadorias

### 3. IPI (Imposto sobre Produtos Industrializados)
- **Localização**: `internal/strategy/IPITax.php` (a ser criado)
- **Taxa padrão**: Variável por produto (0% a 300%)
- **Base de cálculo**: Valor do produto industrializado
- **Fórmula**: `valor * taxa`
- **Observações**:
  - Taxa específica para cada tipo de produto
  - Produtos essenciais podem ter taxa zero
  - Produtos de luxo podem ter taxas altas
  - Pode ser cumulativo com ICMS

## Estrutura do Projeto

```
├── internal/
│   ├── contracts/
│   │   └── taxContract.php      # Interface TaxContract
│   └── strategy/
│       ├── ICMSTax.php          # Estratégia ICMS (parcialmente implementada)
│       ├── ISSTax.php           # Estratégia ISS (a ser implementada)
│       └── IPITax.php           # Estratégia IPI (a ser implementada)
├── application/
│   └── domain/
│       └── usecase/
│           └── UseCase.php      # Caso de uso para aplicar impostos
└── tests/                       # Testes das estratégias
```

## Como Implementar

1. **Complete a implementação do ICMS** em `internal/strategy/ICMSTax.php`
2. **Crie a estratégia ISS** em `internal/strategy/ISSTax.php`
3. **Crie a estratégia IPI** em `internal/strategy/IPITax.php`
4. **Implemente o caso de uso** em `application/domain/usecase/UseCase.php`
5. **Crie testes** para validar cada estratégia

## Exemplo de Uso

```php
// Exemplo de como usar as estratégias
$icmsTax = new ICMSTax();
$issTax = new ISSTax();
$ipiTax = new IPITax();

$amount = 1000.00;

$icmsValue = $icmsTax->calculate($amount); // Deve retornar 180.00
$issValue = $issTax->calculate($amount);   // Deve retornar 50.00
$ipiValue = $ipiTax->calculate($amount);   // Valor depende do produto
```

## Vantagens do Padrão Strategy

1. **Flexibilidade**: Fácil adicionar novos impostos
2. **Manutenibilidade**: Cada imposto é isolado em sua própria classe
3. **Testabilidade**: Cada estratégia pode ser testada independentemente
4. **Extensibilidade**: Novas regras de cálculo podem ser adicionadas sem modificar código existente

# Projeto com Composer e PSR-4 Autoload

Este projeto demonstra uma estrutura básica usando PHP 8 com Composer e autoload PSR-4.

## Requisitos

- PHP 8.0 ou superior
- Composer

## Instalação

1. Clone ou baixe este projeto
2. Execute o comando para instalar as dependências:

```bash
composer install
```

## Estrutura do Projeto

```
├── composer.json          # Configuração do Composer
├── index.php             # Arquivo principal de exemplo
├── src/                  # Código fonte (namespace App\)
│   └── Example.php       # Classe de exemplo
├── tests/                # Testes (namespace Tests\)
│   └── ExampleTest.php   # Teste da classe Example
└── vendor/               # Dependências (gerado pelo Composer)
```

## Uso

Para executar o exemplo:

```bash
php index.php
```

## Testes

Para executar os testes:

```bash
composer test
```

Para executar os testes com cobertura:

```bash
composer test-coverage
```

## Autoload PSR-4

O projeto está configurado com autoload PSR-4:

- `App\` → `src/`
- `Tests\` → `tests/`

## Recursos do PHP 8

Este projeto utiliza recursos do PHP 8:

- Type hints para propriedades
- Type hints para parâmetros e retornos
- Constructor property promotion
- Union types (quando necessário)

## Comandos Úteis

- `composer dump-autoload` - Regenera o autoloader
- `composer update` - Atualiza as dependências
- `composer install` - Instala as dependências 