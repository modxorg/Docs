---
title: "HTTP-сервисы"
translation: "extending-modx/services/http"
---

Начиная с 3.0.0-beta1 MODX использует стандартные для экосистемы инструменты исходящих HTTP-запросов. Это заменяет реализации `modRest` и `modRestClient` и ближе к тому, что принято в PHP-экосистеме.

По умолчанию MODX даёт реализацию этих сервисов на Guzzle. Компонент может переопределить их. Пока вы опираетесь на PSR-интерфейсы, ваш код не ломается при таких заменах.

Из контейнера сервисов можно запросить любой из сервисов PSR-7 (HTTP messages), PSR-17 (HTTP factories) и PSR-18 (HTTP client):

- `\Psr\Http\Client\ClientInterface`: PSR-18 совместимый HTTP Client для отправки PSR-7 request. На каждый вызов даёт свежий `\GuzzleHttp\Client` с настройками по умолчанию.
- `\Psr\Http\Message\ServerRequestFactoryInterface`, PSR-17 совместимый ServerRequestFactory для новых PSR-7 ServerRequest. По умолчанию shared instance `\Http\Factory\Guzzle\ServerRequestFactory` [1]
- `\Psr\Http\Message\RequestFactoryInterface`, PSR-17 совместимый RequestFactory для новых PSR-7 Request. По умолчанию shared instance `\Http\Factory\Guzzle\RequestFactory` [1]
- `\Psr\Http\Message\StreamFactoryInterface`, PSR-7 совместимый StreamFactory, обычно для тела request/response. По умолчанию shared instance `\Http\Factory\Guzzle\StreamFactory`.

[1] Скоро их обновят до `\GuzzleHttp\Psr7\HttpFactory` из `guzzlehttp/psr7` v2. Сейчас конфликт зависимостей, поэтому на старте взяли работу http-interop.

## HTTP GET Request

Независимо от конкретной реализации общий порядок такой:

1. Получите instance `Client`
2. Получите instance `ServerRequestFactory` или `RequestFactory`
3. Создайте request через `$factory->createServerRequest()` или `$factory->createRequest()` и при необходимости измените (headers, post data и т.д.)
4. Отправьте через `$client->sendRequest($request)`
5. Используйте полученный Response

Пример сниппета: GET к API ipinfo.io с Accept для JSON:

```php
<?php
$client = $modx->services->get(\Psr\Http\Client\ClientInterface::class);
$factory = $modx->services->get(\Psr\Http\Message\RequestFactoryInterface::class);

$request = $factory->createRequest('GET', 'http://ipinfo.io/')
    ->withHeader('Accept', 'application/json')
    ->withHeader('Content-Type', 'application/json');

try {
    $response = $client->sendRequest($request);
} catch (\Psr\Http\Client\ClientExceptionInterface $e) {
    $modx->log(1, $e->getMessage());
    return 'Error: ' . $e->getMessage();
}

$body = json_decode($response->getBody()->getContents());

return '<pre>' . $response->getStatusCode() . ' : ' . print_r($body, true) . '</pre>';
```

## HTTP POST request (JSON body)

Для POST с JSON-телом создайте request с методом `POST` и запишите данные в body stream:

``` php
$client = $modx->services->get(\Psr\Http\Client\ClientInterface::class);
$factory = $modx->services->get(\Psr\Http\Message\RequestFactoryInterface::class);

$request = $factory->createRequest('POST', 'https://reqres.in/api/users')
    ->withHeader('Content-Type', 'application/json');

// Write a JSON body (typical for APIs)
$request->getBody()->write(json_encode([
    'name' => 'Rest McApiFace',
    'website' => $modx->getOption('http_host')
]));

try {
    $response = $client->sendRequest($request);
} catch (\Psr\Http\Client\ClientExceptionInterface $e) {
    $modx->log(1, $e->getMessage());
    return 'Error: ' . $e->getMessage();
}

$body = json_decode($response->getBody()->getContents());

return '<pre>' . $response->getStatusCode() . ' : ' . print_r($body, true) . '</pre>';
```

Здесь запись идёт прямо в существующий streaming body request. Можно через StreamFactoryInterface создать новый stream и поставить его как body. Пример:

```php 
<?php
$streamFactory = $modx->services->get(\Psr\Http\Message\StreamFactoryInterface::class);

$stream = $streamFactory->createStream(json_encode([
    'name' => 'Rest McApiFace',
    'website' => $modx->getOption('http_host')
]));

$request = $factory->createRequest('POST', 'https://reqres.in/api/users')
    ->withHeader('Content-Type', 'application/json')
    ->withBody($stream);
```

По смыслу это то же самое, что запись в существующий буфер. Иногда нужно гарантировать пустой stream или взять `createStreamFromFile` / `createStreamFromResource`, если тело уже в файле или PHP resource.

## ServerRequest или Request?

Для исходящих запросов обычно берут Request и RequestFactoryInterface.

ServerRequest ближе к обработке _входящих_ запросов. MODX пока не использует PSR-стандарты для входящих запросов.

## Переопределение HTTP-сервисов

Чтобы переопределить один или несколько HTTP-сервисов, через [dependency injection из 3.0](extending-modx/di-container) вызовите `set()` для нужного интерфейса и передайте свой callable.
