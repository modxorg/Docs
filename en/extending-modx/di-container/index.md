---
title: Dependency Injection Container
description: "Register, load and override services in the MODX 3 dependency injection container"
---

MODX 3 introduces a Dependency Injection Container, based on [Pimple 3](https://github.com/silexphp/Pimple), that holds core services and custom services.

`$modx->getService()` still works but is deprecated. Register new services with `add()` (and read them with `get()`) here instead of `getService()`. See [modX.getService](extending-modx/modx-class/reference/modx.getservice).

The container (`MODX\Revolution\Services\Container`, a [PSR-11](https://www.php-fig.org/psr/psr-11/) Pimple 3 container) lives in `modX::$services`, so you reach it as:

- `$modx->services` (in snippets, plugins, etc)
- `$this->modx->services` (in controllers, processors, etc)
- `$this->xpdo->services` (in model classes)

## Available Services

The core registers these services by default:

| Service ID | Class | Notes |
| --- | --- | --- |
| `config` | array | Configuration properties — see [config](extending-modx/di-container/config) |
| `registry` | `modRegistry` | Registered in `initialize()` |
| `MODX\Revolution\Formatter\modManagerDateFormatter` | `modManagerDateFormatter` | ID is the FQCN; factory (a fresh instance per `get()`) |
| `parser` | `modParser` (class overridable via `modParser.class`) | Lazy |
| `lexicon` | `modLexicon` | Always registered during `initialize()` |
| `error` | `modError` | Lazy, inside `runProcessor()` |
| `errorHandler` | `modErrorHandler` (class overridable via `error_handler_class`) | Guarded with `has()` |
| `session_handler` | your class | Only if the `session_handler_class` option is set and the class implements `SessionHandlerInterface` |
| `Psr\Http\Client\ClientInterface` | `GuzzleHttp\Client` | **Factory — a new instance on every `get()`** |
| `Psr\Http\Message\ServerRequestFactoryInterface` | `GuzzleHttp\Psr7\HttpFactory` | PSR-17 factories |
| `Psr\Http\Message\RequestFactoryInterface` | `GuzzleHttp\Psr7\HttpFactory` | |
| `Psr\Http\Message\ResponseFactoryInterface` | `GuzzleHttp\Psr7\HttpFactory` | |
| `Psr\Http\Message\StreamFactoryInterface` | `GuzzleHttp\Psr7\HttpFactory` | |
| `Psr\Http\Message\UploadedFileFactoryInterface` | `GuzzleHttp\Psr7\HttpFactory` | |
| `Psr\Http\Message\UriFactoryInterface` | `GuzzleHttp\Psr7\HttpFactory` | |

`Psr\Http\Client\ClientInterface` is registered with `factory()` — a fresh client per `get()`, not a shared instance. The container throws `MODX\Revolution\Services\ContainerException` / `NotFoundException`; catch them via the PSR-11 interfaces (`ContainerExceptionInterface`, `NotFoundExceptionInterface`).

## Loading Services

Fetch a service by its ID with `get()`; use `has()` to check first:

```php
try {
    $config = $modx->services->get('config');
}
catch (ContainerExceptionInterface $e) {
    // handle a missing or broken service
}
```

To check registration first:

```php
$service = null;
try {
    if ($modx->services->has('custom_service')) {
        $service = $modx->services->get('custom_service');
    }
}
catch (ContainerExceptionInterface $e) {
    // handle a missing or broken service
}
```

> A service that exists (`has()` returns true) can still throw when `get()` is called on it.

## Injecting Services

Register or override services from your Extra's [namespace bootstrap.php](extending-modx/namespaces); it runs as early in the initialization process as possible.

> **Caveat:** bootstrap.php runs *before* some services are registered. `registry`, `lexicon` and `modManagerDateFormatter` are (re)registered unconditionally after bootstrap — an override of those IDs will be overwritten (or throw Pimple's `FrozenError` if the service was already resolved). For the remaining services (`error`, `parser`, `errorHandler`, the PSR-17 factories, `session_handler`) core registration is guarded with `has()`, so your bootstrap override sticks.

Register a service with `add()`:

```php
$modx->services->add('my_service', function($c) use ($modx) {
    return new MyPackage\MyService($modx);
});
```

Pull dependencies from the container instead of hard-wiring them:

```php
$modx->services->add('my_service', function($c) use ($modx) {
    return new MyPackage\MyService($c['parser'], $c['config']);
});
```

For a fresh instance on every `get()`, use `factory()`:

```php
$modx->services['my_service'] = $modx->services->factory(function($c) use ($modx) {
    return new MyPackage\MyService($modx);
});
```

To wrap an already registered service, use `extend()`:

```php
$modx->services->extend('existing_service', function($existing, $c) use ($modx) {
    $existing->...();
    return $existing;
});
```

[See the Pimple documentation for more information.](https://github.com/silexphp/Pimple)
