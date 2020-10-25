ddd-example
===============================

[![Build Status](https://travis-ci.com/antonioturdo/ddd-example.svg?branch=master)](https://travis-ci.com/antonioturdo/ddd-example)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/antonioturdo/ddd-example/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/antonioturdo/ddd-example/?branch=master)
[![StyleCI](https://github.styleci.io/repos/306698877/shield?branch=master)](https://github.styleci.io/repos/306698877?branch=master)

### Introduzione

Esempio di applicazione utilizzando Domain Driven Design (DDD) e Hexagonal architecture.

La strutturazione del codice è sovradimensionata per il problema affrontato,
ovviamente a solo scopo dimostrativo.

### Setup

Installare le dipendenze con composer

```
php composer install
```

### Esecuzione

Lanciare il comando da terminale

```
php bin/console transactions:report 1
```

Opzionalmente è possibile pure specificare la valuta del report, che di default è EUR

```
php bin/console transactions:report 1 --currency=USD
```

### Test

Lanciare il comando da terminale

```
php vendor/bin/phpunit
```
