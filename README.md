ddd-example
===============================

[![Build Status][ico-travis]][link-travis]
[![Quality Score][ico-code-quality]][link-code-quality]

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

### Test

Lanciare il comando da terminale

```
php vendor/bin/phpunit tests
```
