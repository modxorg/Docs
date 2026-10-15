---
title: "HTTP Services"
---

Since 3.0.0-beta1, MODX makes outgoing HTTP requests through ecosystem-standard PSR services. The legacy `modRest` client still ships but is deprecated; `modRestClient` has been removed. New code should use the PSR services below.

The default implementation uses Guzzle, but a component can override it. Code that depends only on the PSR interfaces is unaffected by such a swap.

You can ask the services container for any of these PSR-7 (messages), PSR-17 (factories) and PSR-18 (client) services:

| Service (interface) | Standard | Default implementation |
|---|---|---|
| `\Psr\Http\Client\ClientInterface` | PSR-18 client that sends a PSR-7 request | a fresh `\GuzzleHttp\Client` per call, default options |
| `\Psr\Http\Message\ServerRequestFactoryInterface` | PSR-17 factory for ServerRequest instances | shared `\GuzzleHttp\Psr7\HttpFactory` |
| `\Psr\Http\Message\RequestFactoryInterface` | PSR-17 factory for Request instances | shared `\GuzzleHttp\Psr7\HttpFactory` |
| `\Psr\Http\Message\StreamFactoryInterface` | PSR-17 factory for request/response bodies | shared `\GuzzleHttp\Psr7\HttpFactory` |
| `\Psr\Http\Message\ResponseFactoryInterface` | PSR-17 factory for Response instances | shared `\GuzzleHttp\Psr7\HttpFactory` |
| `\Psr\Http\Message\UploadedFileFactoryInterface` | PSR-17 factory for uploaded files | shared `\GuzzleHttp\Psr7\HttpFactory` |
| `\Psr\Http\Message\UriFactoryInterface` | PSR-17 factory for URIs | shared `\GuzzleHttp\Psr7\HttpFactory` |

The default Guzzle client reads the `proxy_host`, `proxy_port`, `proxy_username` and `proxy_password` system settings and applies them to every request sent through the `ClientInterface` service, unless you override the service yourself.

## Sending an HTTP GET Request

The general approach does not depend on the implementation:

1. Get a `Client` instance
2. Get either a `ServerRequestFactory` or `RequestFactory` instance
3. Create a request by calling `$factory->createServerRequest()` or `$factory->createRequest()` respectively; alter as needed (headers, post data, etc)
4. Tell the Client to send the request with `$client->sendRequest($request)`
5. Use the given Response

<!-- MEDIA: diagram | must | The request path: the services container hands out the client and the factory, the factory builds the request, the client sends it, the response body is read and decoded | Draw it from the five steps above and the snippet below; name only the PSR interfaces shown on this page -->

A snippet that asks the ipinfo.io API for JSON:

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

## Sending an HTTP POST request (JSON body)

To send a POST request with a JSON body, create a request indicating `POST` and write to the body stream:

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

<!-- MEDIA: output | nice | The JSON answer of the test service to the POST above: status, id and creation time fields with invented values | Send the request once from a test installation and copy the response body -->

Instead of writing to the existing stream, you can create a fresh one with the `StreamFactoryInterface` service and set it as the body:

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

Both ways produce the same request. Use a factory when you must be sure the stream is empty, or use `createStreamFromFile`/`createStreamFromResource` when the body already lives in a file or a PHP resource.

## ServerRequest or Request?

Use `RequestFactoryInterface` for outgoing requests. `ServerRequest` models an _incoming_ request, which MODX does not handle via PSR yet.

## Overwriting HTTP services

To overwrite one or more of the HTTP services, use the [dependency injection introduced in 3.0](extending-modx/di-container) to `add()` the relevant interface to your own callable:

```php
$modx->services->add(\Psr\Http\Client\ClientInterface::class, function ($c) {
    return new MyCustomClient();
});
```

<!-- MEDIA: diagram | nice | The swap behind the interface: code asks the container for ClientInterface, add() binds the interface to your own class, every caller goes through the new class without changes | Draw it from the snippet above and the dependency injection page -->

