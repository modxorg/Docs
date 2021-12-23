---
title: "HTTP Services"
---

As of 3.0.0-beta1, MODX integrates with ecosystem-standard tools for making outgoing HTTP requests. This replaces modRest and modRestClient implementations and is more in line with what's being used in the wider PHP ecosystem.

MODX makes sure to provide a default implementation for these services (using Guzzle), however it is possible to override those from a component. So long as you stick to what is provided by the PSR interfaces, your implementing code will not be affected by such changes. 

This means you can make ask the services container for any of the following services covering PSR-7 (HTTP messages), PSR-17 (HTTP factories) and PSR-18 (HTTP client):

- `\Psr\Http\Client\ClientInterface`: the PSR-18 compatible HTTP Client itself, used for sending a PSR-7 request. Provides a fresh `\GuzzleHttp\Client` instance on each call with the default options.
- `\Psr\Http\Message\ServerRequestFactoryInterface`, a PSR-17 compatible ServerRequestFactory, which is used to create new PSR-7 ServerRequest instances. By default provides a `\Http\Factory\Guzzle\ServerRequestFactory` shared instance [1]
- `\Psr\Http\Message\RequestFactoryInterface`, a PSR-17 compatible RequestFactory, which is used to create new PSR-7 Request instances. By default provides a `\Http\Factory\Guzzle\RequestFactory` shared instance [1]
- `\Psr\Http\Message\StreamFactoryInterface`, a PSR-7 compatible StreamFactory implementation, typically used to create a body for requests/responses. By default provides a `\Http\Factory\Guzzle\StreamFactory` shared instance.

[1] These will be updated soon to the `\GuzzleHttp\Psr7\HttpFactory` provided by `guzzlehttp/psr7` v2; there's currently a dependency conflict so for starters we settled on http-interop's fine work.

## Sending a HTTP GET Request

Regardless of specific implementation, the general approach for sending a request is as follows:

1. Get a `Client` instance
2. Get either a `ServerRequestFactory` or `RequestFactory` instance
3. Create a request by calling `$factory->createServerRequest()` or `$factory->createRequest()` respectively; alter as needed (headers, post data, etc)
4. Tell the Client to send the request with `$client->sendRequest($request)`
5. Use the given Response

For example, put the following in a snippet to send a GET request to the ipinfo.io API with an Accept header to indicate we want JSON:

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

## Sending a HTTP POST request (JSON body)

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

return '<pre>' . $response->getStatusCode() . ' : ' . print_r($body, true) . '</pre>';
```

You'll notice we're writing directly to the existing streaming body on the request. It's also possible to use the StreamFactoryInterface service to create a fresh stream and to set that as the body. For example:

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

This is functionally equivalent to writing to the existing buffer, however there may be cases where you want to make sure the stream is empty, or where you'd like to use the `createStreamFromFile`/`createStreamFromResource` methods if your body is already in a file/php resource.

## ServerRequest or Request?

Typically when sending a request, you'd use a Request and thus the RequestFactoryInterface implementation. 

ServerRequests are more geared towards handling _incoming_ requests, which MODX currently does not use PSR standards for.

## Overwriting HTTP services

To overwrite one or more of the HTTP services, use the [dependency injection introduced in 3.0] to `set()` the relevant interface to your own callable. 

