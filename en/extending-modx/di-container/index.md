---
title: Dependency Injection Container
---

MODX 3 introduces a Dependency Injection Container, based on [Pimple 3](https://github.com/silexphp/Pimple), that holds core services and custom services.

The container is available in `modX:$services`, meaning it is typically accessible in one of the following ways:

- `$modx->services` (in snippets, plugins, etc)
- `$this->modx->services` (in controllers, processors, etc)
- `$this->xpdo->services` (in model classes)

## Available Services

At this time, the following services are automatically registered in the core:

- [`config`](extending-modx/di-container/config): returns an array of configuration properties.

## Loading Services

To load a service from the container, call the `get` method (and/or `has()` method to first check if it exists) with the ID for the service.

```php
try {
    $config = $modx->services->get('config');
}
catch (ContainerExceptionInterface $e) {
    // handle the thing not being available
}
```

Or:

```php
$service = null;
try {
    if ($modx->services->has('custom_service')) {
        $service = $modx->services->get('custom_service');
    }
}
catch (ContainerExceptionInterface $e) {
    // handle the thing not being available
}
```

> A service existing (i.e. `has()` returning true) is not a guarantee that it wont cause an exception when `get()` is called for it. 

## Injecting Services

The recommended way to inject or overwrite services in an extension is through a [namespace's bootstrap.php file](extending-modx/namespaces), which runs as early in the initialisation process as possible.

For example, you may call:

```php
$modx->services->add('my_service', function($c) use ($modx) {
    return new MyPackage\MyService($modx);
});
```

You can use proper dependency injection by passing in the required services. Hypothetical example:

```php
$modx->services->add('my_service', function($c) use ($modx) {
    return new MyPackage\MyService($c['sessions'], $c['parser']);
});
```

If you require a new instance to be returned for each service request, use the `factory()` method:

```php
$modx->services->factory('my_service', function($c) use ($modx) {
    return new MyPackage\MyService($modx);
});
```

To extend a previously defined service, use extend:

```php
$modx->services->extend('existing_service', function($existing, $c) use ($modx) {
    $existing->...();
    return $existing;
});
```

[See the Pimple documentation for more information.](https://github.com/silexphp/Pimple)
