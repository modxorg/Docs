---
title: "modRest"
translation: "extending-modx/services/modrest"
---

## Встроенный curl клиент для отправки запросов на сторонние сервисы (RESTful и другие)

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

Ниже перечислены способы работы с клиентом.

### Отправка запроса c параметрами

Записываем параметры которые хотим отправить нашему сервису

```php
$url = 'http://site.ru/rest/products';
$params = array('limit' => 100);
/* @var modRest $client */
$client = $modx->getService('rest', 'rest.modRest');
// $client->setOption('format','JSON'); // Формат полученных данных принимает json или xml (по умолчанию json) для преобразования в массив
$response = $client->get($url, $params);
$data = $response->process(); // Вернет массив
```

### Проверка доступности метода

Чтобы проверить существование метода или хотите узнать существование какой то страницы, мы можем проверить код статуса страница в переменной `responseInfo`:

```php
$url = 'http://site.ru/rest/mymethod';
/* @var modRest $client */
$client = $modx->getService('rest', 'rest.modRest');
$client->setOption('header', true); // Возвращать заголовок
$response = $client->get($url);
if (property_exists($response->responseInfo, 'scalar')) {
    $code = $response->responseInfo->scalar;
}
echo $code; // 200 - метод доступен, 404 - метод или страница не существует
```

### Проверка доступности сервиса

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

### Авторизация

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

### Чтение header

Чтобы сервис вернул заголовки, перед отправкой запроса нужно указать `$client->setOption('header', true);` тогда в переменной `$response->responseHeaders` мы увидим заголовки ответа от сервиса

```php
$url = 'http://site.ru/rest/mymethod';
/* @var modRest $client */
$client = $modx->getService('rest', 'rest.modRest');
$client->setOption('header', true);
$response = $client->get($url);
echo '<pre>';
print_r($response->responseHeaders); die;
```

### Запись в header

Чтобы послать сервису наши параметры в заголовках:

```php
$url = 'http://site.ru/rest/mymethod';

$headers=  array(
    'Content-type' => 'application/json', // Сообщаем сервису что хотим получить ответ в json формате
    'Authorization' => 'OAuth НАШ TOKEN' // Авторизация через заголовки
);

// передаем наши заголовки сразу в класс
/* @var modRest $client */
$client = $this->modx->getService('rest', 'rest.modRest', array('headers' => $headers);

# или записываем заголовки в запрос
`$response = $client->get($url, array(), $headers);`
```

### Для компонентов

Если возникает ошибка в консоле в виде:

```php
modRestClient::__construct is deprecated since version 2.3.0. Use the modRest classes instead.
```

То необходимо использовать:

```php
$client = $this->modx->getService('rest', 'rest.modRest');
```

так как `modRestClient` устаревшая функция

За подробной информацией о всех возможностях класса смотрите файл: `core/model/modx/rest/modrest.class.php`
