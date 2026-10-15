---
title: "modRest"
translation: "extending-modx/services/modrest"
---

Встроенный curl клиент для отправки запросов на сторонние сервисы (RESTful и другие)

Так как все чаще используются сторонние сервисы в повседневной разработке сайтов, для этих целей в MODX есть встроенный клиент, с помощью которого можно отправлять запросы:

```php
/* @var modRest $client */
$client = $modx->getService('rest', 'rest.modRest');
$response = $client->get('GET запрос');
# или
$response = $client->post('POST запрос');

// Обработка полученных данных в json или xml формате и преобразование их в массив
$array = $response->process();
```

## Отправка запроса c параметрами

```php
$url = 'http://site.ru/rest/products';
$params = array('limit' => 100);
/* @var modRest $client */
$client = $modx->getService('rest', 'rest.modRest');
// $client->setOption('format','JSON'); // Формат полученных данных принимает json или xml (по умолчанию json) для преобразования в массив
// $client->setOption('suppressSuffix','true'); // иначе при использовании format=json в конец url добавится http://site.ru/method.json
$response = $client->get($url, $params);
$data = $response->process(); // Вернет массив
```

## Проверка доступности метода

Чтобы проверить существование метода или узнать существование какой-то страницы, можно проверить код статуса в переменной `responseInfo`. Заголовки ответа собираются по умолчанию (опция `header` включена из коробки), поэтому ничего дополнительно настраивать не нужно:

```php
$url = 'http://site.ru/rest/mymethod';
/* @var modRest $client */
$client = $modx->getService('rest', 'rest.modRest');
// $client->setOption('header', false); // передайте false, если заголовки не нужны
$response = $client->get($url);
if (property_exists($response->responseInfo, 'scalar')) {
    $code = $response->responseInfo->scalar;
}
echo $code; // 200 - метод доступен, 404 - метод или страница не существует
```

## Проверка доступности сервиса

Иногда сервисы падают или слишком долго отвечают, для этого существует переменная `responseError` куда записывают ошибки.

```php
$url = 'http://site.ru/rest/mymethod';
/* @var modRest $client */
$client = $modx->getService('rest', 'rest.modRest');
$client->setOption('timeout', 15); // Устанавливаем время ожидания
$response = $client->get($url);
if ($response->responseError) {
    echo $response->responseError; // печатаем сообщение об ошибке
}
```

## Авторизация

Для авторизации в сервисе по средствам `CURLOPT_HTTPHEADER`, необходимо в опциях указать `username` и `password`

```php
$url = 'http://site.ru/rest/mymethod';
/* @var modRest $client */
$client = $modx->getService('rest', 'rest.modRest');

$client->setOption('username', 'Логин');
$client->setOption('password', 'пароль');

$response = $client->get($url);
if (property_exists($response->responseInfo, 'scalar')) {
    $code = $response->responseInfo->scalar;
}
echo $code; // 200 - авторизованы, 403 - авторизация не пройдена
```

## Чтение заголовков ответа

Заголовки ответа собираются по умолчанию; после запроса они доступны в `$response->responseHeaders`. Передайте опции `header` значение `false`, если они вам не нужны:

```php
$url = 'http://site.ru/rest/mymethod';
/* @var modRest $client */
$client = $modx->getService('rest', 'rest.modRest');
$response = $client->get($url);
echo '<pre>' . print_r($response->responseHeaders, true) . '</pre>';
```

## Отправка заголовков запроса

Чтобы послать сервису наши параметры в заголовках:

```php
$url = 'http://site.ru/rest/mymethod';

$headers=  array(
    'Content-type' => 'application/json', // Сообщаем сервису что хотим получить ответ в json формате
    'Authorization' => 'OAuth НАШ TOKEN' // Авторизация через заголовки
);

// передаем заголовки 4-м аргументом getService ($params):
/* @var modRest $client */
$client = $modx->getService('rest', 'rest.modRest', '', array('headers' => $headers));

# или записываем заголовки в запрос
$response = $client->get($url, array(), $headers);
```

## Опции конфигурации и другие методы

Конструктор `modRest` принимает массив конфигурации (аргумент `$params` у `getService`). Распознаваемые ключи:

- `format` — формат ответа для `process()`: `json` или `xml`;
- `header` — собирать заголовки ответа (по умолчанию `true`);
- `headers` — заголовки по умолчанию, добавляемые в каждый запрос;
- `username` / `password` — HTTP-аутентификация;
- `timeout` — таймаут curl в секундах (по умолчанию `240`), плюс `connectTimeout`, `sslVerifypeer`, `sslVerifyhost`, `cookie`, `cookieFile`, `encoding`, `referer`, `userAgent`, `followLocation`, `maxRedirs` и другие curl-опции;
- `baseUrl` — базовый URL, добавляемый к путям запросов;
- `addMethodParameter` — если включено, `put()`/`delete()` передают `_method=PUT`/`DELETE` параметром (для серверов, принимающих только GET/POST);
- `defaultParameters` — параметры, объединяемые с каждым запросом;
- `suppressSuffix` — не добавлять суффиксы `.json`/`.xml`;
- `userAgent` — по умолчанию `MODX RestClient/1.0.0`.

Помимо `get()` и `post()`, показанных выше, клиент предоставляет `put($url, $parameters, $headers)`, `delete($url, $parameters, $headers)` и универсальный `request($method, $url, $parameters, $headers)`.

За подробной информацией о всех возможностях класса смотрите исходный файл: `core/src/Revolution/Rest/modRest.php`
