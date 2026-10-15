---
title: "HTTP-сервисы"
translation: "extending-modx/services/http"
---

Начиная с 3.0.0-beta1 MODX использует стандартные для экосистемы инструменты исходящих HTTP-запросов. Устаревший клиент `modRest` все еще поставляется с ядром, но помечен как deprecated; `modRestClient` удален. Новый код предполагается писать на PSR-сервисах ниже — они ближе к тому, что принято в PHP-экосистеме.

По умолчанию MODX даёт реализацию этих сервисов на Guzzle. Компонент может переопределить их. Пока вы опираетесь на PSR-интерфейсы, ваш код не ломается при таких заменах.

Из контейнера сервисов можно запросить любой из сервисов PSR-7 (HTTP messages), PSR-17 (HTTP factories) и PSR-18 (HTTP client):

- `\Psr\Http\Client\ClientInterface`: PSR-18 совместимый HTTP Client для отправки PSR-7 request. На каждый вызов даёт свежий `\GuzzleHttp\Client` с настройками по умолчанию.
- `\Psr\Http\Message\ServerRequestFactoryInterface`, PSR-17 совместимый ServerRequestFactory для новых PSR-7 ServerRequest. По умолчанию shared instance `\GuzzleHttp\Psr7\HttpFactory`.
- `\Psr\Http\Message\RequestFactoryInterface`, PSR-17 совместимый RequestFactory для новых PSR-7 Request. По умолчанию shared instance `\GuzzleHttp\Psr7\HttpFactory`.
- `\Psr\Http\Message\StreamFactoryInterface`, PSR-7 совместимый StreamFactory, обычно для тела request/response. По умолчанию shared instance `\GuzzleHttp\Psr7\HttpFactory`.
- `\Psr\Http\Message\ResponseFactoryInterface`, PSR-17 совместимый ResponseFactory. По умолчанию shared instance `\GuzzleHttp\Psr7\HttpFactory`.
- `\Psr\Http\Message\UploadedFileFactoryInterface`, PSR-17 совместимый UploadedFileFactory. По умолчанию shared instance `\GuzzleHttp\Psr7\HttpFactory`.
- `\Psr\Http\Message\UriFactoryInterface`, PSR-17 совместимый UriFactory. По умолчанию shared instance `\GuzzleHttp\Psr7\HttpFactory`.

Клиент Guzzle по умолчанию берет настройки прокси из системных настроек `proxy_host`, `proxy_port`, `proxy_username` и `proxy_password`; они применяются к каждому запросу через сервис `ClientInterface`, пока вы не переопределите сервис сами.

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

return print_r($body, true);
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

return print_r($body, true);
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

Для исходящих запросов берут `RequestFactoryInterface`. `ServerRequest` описывает _входящие_ запросы, которые MODX пока не обрабатывает через PSR.

## Переопределение HTTP-сервисов

Чтобы переопределить один или несколько HTTP-сервисов, через [dependency injection из 3.0](extending-modx/di-container) зарегистрируйте нужный интерфейс через `add()` и передайте свой callable:

```php
$modx->services->add(\Psr\Http\Client\ClientInterface::class, function ($c) {
    return new MyCustomClient();
});
```

