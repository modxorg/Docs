---
title: Контейнер для инъекций зависимостей
translation: "extending-modx/di-container/config"
---

MODX 3 представляет контейнер для инъекций зависимости, основанный на [Pimple 3](https://github.com/silexphp/Pimple), который содержит сервисы ядра и кастомные сервисы.

Контейнер доступен в `modX:$services`, что означает, что он обычно доступен одним из следующих способов:

-   `$modx->services` (в snippets, plugins, и так далее)
-   `$this->modx->services` (в controllers, processors, и так далее)
-   `$this->xpdo->services` (в model classes)

## Доступные сервисы

В это время в ядре автоматически регистрируются следующие сервисы:

-   [`config`](extending-modx/di-container/config): возвращает массив свойств конфигурации.

## Загрузка сервисов

Чтобы загрузить сервис из контейнера, вызовите метод `get` (и/или `has()` метод, чтобы сначала проверить, существует ли он) с идентификатором для сервиса.

```php
try {
    $config = $modx->services->get('config');
}
catch (ContainerExceptionInterface $e) {
    // handle the thing not being available
}
```

Или:

```php
$service = null;
try {
    if ($modx->services->has('custom-service')) {
        $service = $modx->services->get('custom-service');
    }
}
catch (ContainerExceptionInterface $e) {
    // handle the thing not being available
}
```

> Существующая служба (то есть `has()`, возвращающая true) не является гарантией того, что она не вызовет исключение, когда для нее вызывается `get()`.

## Инъекционные сервисы

Рекомендуемый способ внедрения или перезаписи служб в расширении - через [namespace's bootstrap.php file](extending-modx/namespaces), который выполняется как можно раньше в процессе инициализации.

Например, вы можете вызвать:

```php
$modx->services->add('myservice', function($c) use ($modx) {
    return new MyPackage\MyService($modx);
});
```

Вы можете использовать правильное внедрение зависимостей, передавая необходимые сервисы. Гипотетический пример:

```php
$modx->services->add('myservice', function($c) use ($modx) {
    return new MyPackage\MyService($c['sessions'], $c['parser']);
});
```

Если вам требуется, чтобы новый экземпляр возвращался для каждого запроса на обслуживание, используйте метод `factory()`:

```php
$modx->services->factory('myservice', function($c) use ($modx) {
    return new MyPackage\MyService($modx);
});
```

Чтобы расширить ранее определенный сервис, используйте extend:

```php
$modx->services->extend('existing-service', function($existing, $c) use ($modx) {
    $existing->...();
    return $existing;
});
```

[Смотрите документацию Pimple для получения дополнительной информации.](https://github.com/silexphp/Pimple)
