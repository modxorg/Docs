---
title: Контейнер для инъекций зависимостей
translation: "extending-modx/di-container"
description: "Регистрация, загрузка и переопределение сервисов в DI-контейнере MODX 3"
---

MODX 3 представляет контейнер внедрения зависимостей, основанный на [Pimple 3](https://github.com/silexphp/Pimple), который содержит сервисы ядра и кастомные сервисы.

`$modx->getService()` ещё работает, но устарел. Новые сервисы регистрируйте через `add()` (и читайте через `get()`), а не через `getService()`. См. [modX.getService](extending-modx/modx-class/reference/modx.getservice).

Контейнер (`MODX\Revolution\Services\Container` — контейнер Pimple 3, совместимый с [PSR-11](https://www.php-fig.org/psr/psr-11/)) доступен в `modX::$services`, то есть обычно доступен одним из следующих способов:

-   `$modx->services` (в snippets, plugins, и так далее)
-   `$this->modx->services` (в controllers, processors, и так далее)
-   `$this->xpdo->services` (в model classes)

## Доступные сервисы

Ядро по умолчанию регистрирует следующие сервисы:

| ID сервиса | Класс | Примечания |
| --- | --- | --- |
| `config` | array | Свойства конфигурации — см. [config](extending-modx/di-container/config) |
| `registry` | `modRegistry` | Регистрируется в `initialize()` |
| `MODX\Revolution\Formatter\modManagerDateFormatter` | `modManagerDateFormatter` | ID — полное имя класса; factory (свежий экземпляр на каждый `get()`) |
| `parser` | `modParser` (класс настраивается опцией `modParser.class`) | Лениво |
| `lexicon` | `modLexicon` | Всегда регистрируется в `initialize()` |
| `error` | `modError` | Лениво, внутри `runProcessor()` |
| `errorHandler` | `modErrorHandler` (класс настраивается `error_handler_class`) | Защищён проверкой `has()` |
| `session_handler` | ваш класс | Только если задана опция `session_handler_class` и класс реализует `SessionHandlerInterface` |
| `Psr\Http\Client\ClientInterface` | `GuzzleHttp\Client` | **Factory — новый экземпляр на каждый `get()`** |
| `Psr\Http\Message\ServerRequestFactoryInterface` | `GuzzleHttp\Psr7\HttpFactory` | Фабрики PSR-17 |
| `Psr\Http\Message\RequestFactoryInterface` | `GuzzleHttp\Psr7\HttpFactory` | |
| `Psr\Http\Message\ResponseFactoryInterface` | `GuzzleHttp\Psr7\HttpFactory` | |
| `Psr\Http\Message\StreamFactoryInterface` | `GuzzleHttp\Psr7\HttpFactory` | |
| `Psr\Http\Message\UploadedFileFactoryInterface` | `GuzzleHttp\Psr7\HttpFactory` | |
| `Psr\Http\Message\UriFactoryInterface` | `GuzzleHttp\Psr7\HttpFactory` | |

Обратите внимание: `Psr\Http\Client\ClientInterface` регистрируется через `factory()` — на каждый `get()` приходит новый клиент, а не общий экземпляр. Контейнер бросает `MODX\Revolution\Services\ContainerException` / `NotFoundException`; ловите их через PSR-интерфейсы (`ContainerExceptionInterface`, `NotFoundExceptionInterface`).

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

Рекомендуемый способ внедрения или перезаписи служб в расширении — через [файл bootstrap.php пространства имён](extending-modx/namespaces), который выполняется как можно раньше в процессе инициализации.

> **Оговорка:** bootstrap.php выполняется *до* регистрации части сервисов. `registry`, `lexicon` и `modManagerDateFormatter` (ре)регистрируются безусловно после bootstrap — переопределение этих ID будет затёрто (или брошено `FrozenError` Pimple, если сервис уже разрешён). Для остальных сервисов (`error`, `parser`, `errorHandler`, фабрики PSR-17, `session_handler`) проверка `has()` в ядре есть, поэтому ваше переопределение из bootstrap сохраняется.

Например, вы можете вызвать:

```php
$modx->services->add('myservice', function($c) use ($modx) {
    return new MyPackage\MyService($modx);
});
```

Правильное внедрение зависимостей — через другие сервисы контейнера. Пример:

```php
$modx->services->add('myservice', function($c) use ($modx) {
    return new MyPackage\MyService($c['parser'], $c['config']);
});
```

Если вам требуется, чтобы новый экземпляр возвращался для каждого запроса на обслуживание, используйте метод `factory()`:

```php
$modx->services['myservice'] = $modx->services->factory(function($c) use ($modx) {
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
