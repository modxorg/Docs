---
title: "modRest"
translation: "extending-modx/services/modrest"
---

> Note: modRest is deprecated.
> 
> It's strongly encouraged to use the [PSR HTTP Services](extending-modx/services/http) provided since MODX 3.0.0-beta1. 

Built-in curl client for sending requests to third-party services (RESTful and others)

Since third-party services are increasingly being used in the daily development of sites, for these purposes MODX has a built-in client with which you can send requests:

```php
/* @var modRest $client */
$client = $modx->getService('rest', 'rest.modRest');
$response = $client->get('GET request');
# or
$response = $client->post('POST request');

// Processing the received data in json or xml format and converting them into an array
$array = $response->process();
```

The following are ways to work with the client.

## Sending a request with parameters

We write down the parameters that we want to send to our service

```php
$url = 'http://site.ru/rest/products';
$params = array('limit' => 100);
/* @var modRest $client */
$client = $modx->getService('rest', 'rest.modRest');
// $client->setOption('format','JSON'); // The format of the received data accepts json or xml (json by default) for conversion to an array
$response = $client->get($url, $params);
$data = $response->process(); // Will return an array
```

## Checking Method Availability

To check the existence of a method or want to know the existence of a page, we can check the status code of the page in a variable `responseInfo`:

```php
$url = 'http://site.ru/rest/mymethod';
/* @var modRest $client */
$client = $modx->getService('rest', 'rest.modRest');
$client->setOption('header', true); // Return title
$response = $client->get($url);
if (property_exists($response->responseInfo, 'scalar')) {
    $code = $response->responseInfo->scalar;
}
echo $code; // 200 - method is available, 404 - method or page does not exist
```

## Checking Service Availability

Sometimes services fall or respond too long, for this there is a variable `responseError` where errors are written.

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

For authorization in the service by means `CURLOPT_HTTPHEADER`, must specify in options `username` and `password`

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

## Read header

For the service to return the headers, you must specify before sending the request `$client->setOption('header', true);` then in the variable `$response->responseHeaders` we will see response headers from the service

```php
$url = 'http://site.ru/rest/mymethod';
/* @var modRest $client */
$client = $modx->getService('rest', 'rest.modRest');
$client->setOption('header', true);
$response = $client->get($url);
echo '<pre>' . print_r($response->responseHeaders, true) . '</pre>;
```

## Record in header

To send the service our parameters in the headers:

```php
$url = 'http://site.ru/rest/mymethod';

$headers=  array(
    'Content-type' => 'application/json', // We inform the service that we want to receive a response in json format
    'Authorization' => 'OAuth OUR TOKEN' // Authorization through headers
);

// we pass our headers immediately to the class
/* @var modRest $client */
$client = $this->modx->getService('rest', 'rest.modRest', array('headers' => $headers));

# or write headers in the request
`$response = $client->get($url, array(), $headers);`
```

## For components

If an error occurs in the console in the form

```php
modRestClient::__construct is deprecated since version 2.3.0. Use the modRest classes instead.
```

the following class has to be used in the code

```php
$client = $this->modx->getService('rest', 'rest.modRest');
```

because `modRestClient` is a deprecated class.

For more information about all the features of the class, see the file: `core/model/modx/rest/modrest.class.php`
