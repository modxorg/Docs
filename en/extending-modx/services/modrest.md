---
title: "modRest"
translation: "extending-modx/services/modrest"
---

> Note: modRest is deprecated.
> 
> It's strongly encouraged to use the [PSR HTTP Services](extending-modx/services/http) provided since MODX 3.0.0-beta1. 

modRest is a built-in curl client for requests to third-party services:

```php
/* @var modRest $client */
$client = $modx->getService('rest', 'rest.modRest');
$response = $client->get('GET request');
# or
$response = $client->post('POST request');

// Processing the received data in json or xml format and converting them into an array
$array = $response->process();
```

## Sending a request with parameters

```php
$url = 'http://site.ru/rest/products';
$params = array('limit' => 100);
/* @var modRest $client */
$client = $modx->getService('rest', 'rest.modRest');
// $client->setOption('format','json'); // The format of the received data accepts json or xml (json by default) for conversion to an array
$response = $client->get($url, $params);
$data = $response->process(); // Will return an array
```

## Checking Method Availability

Check the status code in `$response->responseInfo->scalar`. Response headers are collected by default (the `header` option is enabled out of the box), so no extra setup is needed:

```php
$url = 'http://site.ru/rest/mymethod';
/* @var modRest $client */
$client = $modx->getService('rest', 'rest.modRest');
// $client->setOption('header', false); // pass false to skip collecting headers
$response = $client->get($url);
if (property_exists($response->responseInfo, 'scalar')) {
    $code = $response->responseInfo->scalar;
}
echo $code; // 200 - method is available, 404 - method or page does not exist
```

## Checking Service Availability

If the service is down or answers too slowly, `$response->responseError` holds the error:

```php
$url = 'http://site.ru/rest/mymethod';
/* @var modRest $client */
$client = $modx->getService('rest', 'rest.modRest');
$client->setOption('timeout', 15); // Set the timeout
$response = $client->get($url);
if ($response->responseError) {
    echo $response->responseError; // print error message
}
```

## Login

For HTTP authorization, set the `username` and `password` options:

```php
$url = 'http://site.ru/rest/mymethod';
/* @var modRest $client */
$client = $modx->getService('rest', 'rest.modRest');

$client->setOption('username', 'login');
$client->setOption('password', 'password');

$response = $client->get($url);
if (property_exists($response->responseInfo, 'scalar')) {
    $code = $response->responseInfo->scalar;
}
echo $code; // 200 - authorized, 403 - authorization failed
```

## Reading Response Headers

Response headers are collected by default; after the request they are available in `$response->responseHeaders`. Pass `false` to the `header` option if you don't need them:

```php
$url = 'http://site.ru/rest/mymethod';
/* @var modRest $client */
$client = $modx->getService('rest', 'rest.modRest');
$response = $client->get($url);
echo '<pre>' . print_r($response->responseHeaders, true) . '</pre>';
```

## Sending Request Headers

Send your own headers with the request two ways:

```php
$url = 'http://site.ru/rest/mymethod';

$headers=  array(
    'Content-type' => 'application/json', // We inform the service that we want to receive a response in json format
    'Authorization' => 'OAuth OUR TOKEN' // Authorization through headers
);

// pass headers as the 4th argument of getService ($params):
/* @var modRest $client */
$client = $modx->getService('rest', 'rest.modRest', '', array('headers' => $headers));

# or write headers in the request
$response = $client->get($url, array(), $headers);
```

## Configuration options and other methods

The `modRest` constructor accepts a config array (the `$params` argument of `getService`). Recognized keys:

- `format` — response format for `process()`: `json` or `xml`;
- `header` — collect response headers (default `true`);
- `headers` — default headers added to every request;
- `username` / `password` — HTTP authentication;
- `timeout` — curl timeout in seconds (default `240`), plus `connectTimeout`, `sslVerifypeer`, `sslVerifyhost`, `cookie`, `cookieFile`, `encoding`, `referer`, `userAgent`, `followLocation`, `maxRedirs` and other curl options;
- `baseUrl` — base URL prepended to request paths;
- `addMethodParameter` — when true, `put()`/`delete()` pass `_method=PUT`/`DELETE` as a parameter (for servers that only accept GET/POST);
- `defaultParameters` — parameters merged into every request;
- `suppressSuffix` — do not append `.json`/`.xml` suffixes;
- `userAgent` — default `MODX RestClient/1.0.0`.

Beyond `get()` and `post()` shown above, the client provides `put($url, $parameters, $headers)`, `delete($url, $parameters, $headers)` and the generic `request($method, $url, $parameters, $headers)`.

For more information about all the features of the class, see the source file: `core/src/Revolution/Rest/modRest.php`
