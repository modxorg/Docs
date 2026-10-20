---
title: "Разработка RESTful API"
description: "Собственный REST API в MODX Revolution на modRestService и modRestController: загрузка, маршруты, CRUD, хуки, авторизация и формат ответа."
translation: "extending-modx/developing-restful-api"
---

MODX даёт небольшой REST-сервер на классах `modRestService` и `modRestController`. Вы направляете HTTP-запросы на bootstrap-скрипт, сопоставляете пути URL с классами контроллеров и получаете CRUD над объектами xPDO плюс хуки для авторизации, валидации и формы ответа.

Страница покрывает MODX 2.x и MODX 3.x. В 3.x классы лежат в `MODX\Revolution\Rest\*`. Публичный API контроллеров совпадает, но конфигурация сервиса — нет: в 3.x есть опция `sanitize`, в 2.x — `xmlDisableEntityLoader`.

> Исходящие HTTP-запросы из MODX к чужим API это другой стек. См. [HTTP-клиент](extending-modx/services/http). Устаревший клиент `modRest` описан в [Services](extending-modx/services/modrest).

## Что почитать заранее

Книга Phil Sturgeon *[Build APIs you won't hate](https://leanpub.com/build-apis-you-wont-hate)* хорошо закрывает REST-соглашения до того, как вы начнёте писать контроллеры.

## Коротко

1. Создайте `rest/index.php`: загрузка MODX, настройка `modRestService`, вызовы `prepare()` и `process()`.
2. Направьте `/rest/*` на этот скрипт (`.htaccess` внутри `rest/` или `location` в nginx).
3. Добавьте по одному классу контроллера на конечную точку в `rest/Controllers/`.

## 1. Начальная загрузка API

Кладите API в `/rest/` (пути поправьте под свой каталог).

### MODX 3.x

```php
<?php
use MODX\Revolution\modX;
use MODX\Revolution\Rest\modRestService;

require_once dirname(__DIR__) . '/config.core.php';
require_once MODX_CORE_PATH . 'vendor/autoload.php';

$modx = new modX();
$modx->initialize('web');
$modx->getService('error', 'error.modError', '', '');

$path = $modx->getOption(
    'mypackage.core_path',
    null,
    $modx->getOption('core_path') . 'components/mypackage/'
) . 'model/mypackage/';
$modx->addPackage('mypackage', $path);

$rest = new modRestService($modx, [
    'basePath' => __DIR__ . '/Controllers/',
    'controllerClassSeparator' => '',
    'controllerClassPrefix' => 'MyController',
    'xmlRootNode' => 'response',
]);

$rest->prepare();
if (!$rest->checkPermissions()) {
    $rest->sendUnauthorized(true);
}
$rest->process();
```

### MODX 2.x

```php
<?php
require_once dirname(dirname(__FILE__)) . '/config.core.php';
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';

$modx = new modX();
$modx->initialize('web');
$modx->getService('error', 'error.modError', '', '');

$path = $modx->getOption(
    'mypackage.core_path',
    null,
    $modx->getOption('core_path') . 'components/mypackage/'
) . 'model/mypackage/';
$modx->getService('mypackage', 'myPackage', $path);

$rest = $modx->getService('rest', 'rest.modRestService', '', [
    'basePath' => dirname(__FILE__) . '/Controllers/',
    'controllerClassSeparator' => '',
    'controllerClassPrefix' => 'MyController',
    'xmlRootNode' => 'response',
]);

$rest->prepare();
if (!$rest->checkPermissions()) {
    $rest->sendUnauthorized(true);
}
$rest->process();
```

`checkPermissions()` у сервиса по умолчанию возвращает `true`. Переопределите метод в своём подклассе сервиса (или режьте трафик раньше), если нужна проверка на каждый запрос. Авторизация на уровне контроллера идёт через `verifyAuthentication()` (ниже).

> [!WARNING]
> `process()` не возвращает ответ — он отправляет его и завершает скрипт (`exit(0)`). Код после вызова не выполняется, результат нужно разбирать из вывода. Поведение отключается опцией `exitOnResponse => false`.

Запрос без сегмента пути (`/rest/`) попадает на контроллер `Index`: имя действия задаётся опцией `defaultAction`.

### Перезапись URL

Правила rewrite кладите **внутрь** `rest/`, чтобы остальной сайт ходил как обычно.

**Apache** (`rest/.htaccess`):

```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?_rest=$1 [QSA,L]
```

**nginx**:

```nginx
location /rest/ {
    try_files $uri @modx_rest;
}
location @modx_rest {
    rewrite ^/rest/(.*)$ /rest/index.php?_rest=$1&$args last;
}
```

Откройте `/rest/foobar` в браузере. Рабочий bootstrap отдаёт JSON вида:

```json
{
    "success": false,
    "message": "Method not allowed",
    "object": [],
    "code": 405
}
```

Код 405 со сообщением `Method not allowed` значит, что роутер отработал, а контроллер не найден. Дальше добавляйте контроллеры.

### Полезные опции `modRestService`

| Опция | По умолчанию | Назначение |
| --- | --- | --- |
| `basePath` | `base_path` сайта | Каталог файлов контроллеров |
| `controllerClassPrefix` | `modRestController` | Префикс класса из имени файла |
| `controllerClassSeparator` | `''` | Соединитель префикса и сегмента класса |
| `controllerClassFilePostfix` | `.php` | Расширение файлов при обходе каталогов |
| `defaultAction` | `index` | Контроллер для запроса без сегмента пути |
| `requestParameter` | `_rest` | GET-параметр с путём (`items`, `items/15`) |
| `defaultResponseFormat` | `json` | Формат, если суффикса нет |
| `supportedFormats` | `xml,json,qs` | Какие суффиксы формата распознаются |
| `checkForSuffix` | `true` | Разбирать ли суффикс формата в пути |
| `collectionResultsKey` / `collectionTotalKey` | `results` / `total` | Ключи в ответе списка |
| `propertyLimit` / `propertyOffset` | `limit` / `start` | Имена параметров пагинации |
| `propertySort` / `propertySortDir` | `sort` / `dir` | Имена параметров сортировки |
| `propertySearch` | `search` | Имя параметра текстового поиска |
| `defaultSuccessStatusCode` / `defaultFailureStatusCode` | `200` / `200` | HTTP-коды для `success()` / `failure()` |
| `responseSuccessKey` / `responseMessageKey` / `responseObjectKey` / `responseErrorsKey` | `success` / `message` / `object` / `errors` | Ключи тела ответа контроллера |
| `errorMessageSeparator` | `' '` | Разделитель ошибок в `addFieldError()` |
| `trimParameters` | `false` | Обрезать пробелы у строковых параметров запроса |
| `sanitize` | `false` | Только 3.x: прогнать параметры через `modX::sanitize()` |
| `exitOnResponse` | `true` | Завершать скрипт после отправки ответа |
| `xmlRootNode` | `response` | Корневой узол при выводе в XML |

Неизвестный суффикс не считается ошибкой — запрос уходит в `defaultResponseFormat`. Служебные коды сервиса (`400`, `401`, `405`, `500`) всегда содержат ключи `success`, `message`, `object`, `code`: ключи из `response*Key` на них не влияют.

## 2. Конечные точки API

Один сегмент пути это один тип ресурса. HTTP-глаголы делают работу:

- `GET /items`: список
- `GET /items/15`: чтение по первичному ключу `15`
- `POST /items`: создание
- `PUT /items/15`: обновление
- `DELETE /items/15`: удаление

Пути вроде `/items/create` не нужны. `POST /items` уже означает создание.

При `controllerClassPrefix => 'MyController'` и пустом separator файл `rest/Controllers/Items.php` должен объявлять класс `MyControllerItems`. Сопоставление пути с файлом нечувствительно к регистру: `/rest/Items` и `/rest/items` ведут в один контроллер.

### Контроллер для MODX 3.x

```php
<?php
use MODX\Revolution\Rest\modRestController;

class MyControllerItems extends modRestController
{
    public $classKey = 'ToDoItem';
    public $defaultSortField = 'sortorder';
    public $defaultSortDirection = 'ASC';
}
```

### Контроллер для MODX 2.x

```php
<?php
class MyControllerItems extends modRestController
{
    public $classKey = 'ToDoItem';
    public $defaultSortField = 'sortorder';
    public $defaultSortDirection = 'ASC';
}
```

Загрузите пакет через `addPackage()` (или сервис Extra) до `process()`, чтобы `ToDoItem` находился. Для быстрого теста без своего пакета поставьте `$classKey = 'modResource'` (в 3.x можно `\MODX\Revolution\modResource`) и `$defaultSortField = 'id'`.

`GET /rest/items` вернёт коллекцию:

```json
{
    "results": [
        {
            "id": 1,
            "sortorder": 1,
            "name": "Закончить документацию RESTful API",
            "added": "2014-09-14",
            "target_completion_date": "2014-10-14",
            "assigned_to": ""
        }
    ],
    "total": 1
}
```

`GET /rest/items/1`, `POST`, `PUT` и `DELETE` работают из того же класса. Для глаголов кроме GET удобны curl или API-клиент.

### Маршрутизация запросов

| Запрос | Вход в контроллер |
| --- | --- |
| `GET /items` | `get()` → `getList()` |
| `GET /items/5` | `get()` → `read($id)` |
| `POST /items` | `post()` |
| `PUT /items/5` | `put()` |
| `DELETE /items/5` | `delete()` |

Сегмент ID копируется в `$this->primaryKeyField` (по умолчанию `id`) до вызова метода.

Контроллер без метода нужного глагола даёт `405 Unsupported HTTP method`. Класс, который нельзя создать (например, абстрактный), даёт `400`. Если метод глагола не вызвал ни `success()`, ни `failure()`, ни `collection()`, сервис отвечает повторным `405` вместо вашего payload.

Параметры запроса собираются по-разному: `GET` читает только строку запроса, `POST` — строку запроса плюс тело, `PUT` — `$_POST` и тело (параметры в адресе игнорируются), `DELETE` — строку запроса и тело.

### Параметры списка

Значения по умолчанию из конфига сервиса:

| Параметр | Назначение |
| --- | --- |
| `limit` | Размер страницы (`$defaultLimit`, по умолчанию `20`) |
| `start` | Смещение |
| `sort` | Поле сортировки (иначе `$defaultSortField`, по умолчанию `name`) |
| `dir` | `ASC` или `DESC` |
| `search` | LIKE по полям из `$searchFields` |

Пример: `/rest/items?limit=10&start=0&sort=name&dir=ASC&search=docs`

## 3. Свойства контроллера

Эти свойства задают поведение стандартного CRUD:

| Свойство | Назначение |
| --- | --- |
| `$classKey` | Класс xPDO |
| `$classAlias` | Необязательный alias в запросе |
| `$primaryKeyField` | Поле для read/update/delete (по умолчанию `id`) |
| `$defaultSortField` / `$defaultSortDirection` | Сортировка списка (по умолчанию `name` и `ASC`) |
| `$defaultLimit` / `$defaultOffset` | Пагинация по умолчанию (`20` и `0`) |
| `$searchFields` | Поля для параметра `search` |
| `$postRequiredFields` / `$putRequiredFields` / `$deleteRequiredFields` | Обязательные поля запроса |
| `$postRequiredRelatedObjects` / `$putRequiredRelatedObjects` | Карта `field => classKey`, объекты должны существовать |
| `$postMethod` / `$putMethod` / `$deleteMethod` | Методы объекта для записи (`save` / `save` / `remove`) |
| `$allowedMethods` | Глаголы в заголовке `Access-Control-Allow-Methods` при `OPTIONS` |
| `$allowedHeaders` | Заголовки в `Access-Control-Allow-Headers` (по умолчанию `Content-Type`) |

> [!WARNING]
> `$allowedMethods` не ограничивает запросы. Глагол отбрасывается по одному признаку — есть ли в контроллере одноимённый метод; неизвестный глагол даёт `405`. Список попадает только в заголовок CORS.

Конструктор контроллера переопределять нельзя: экземпляр создаёт сервис.

## 4. Хуки и форма ответа

Стандартные `get` / `post` / `put` / `delete` закрывают обычный сценарий. Хуки нужны для фильтров, прав и другого payload.

**Инициализация**: `initialize()` вызывается после проверки прав и до метода глагола — удобное место для общих настроек контроллера.

**До записи/удаления**: верните `true`, чтобы продолжить, или `false` / строку ошибки, чтобы остановить:

- `beforePost()`
- `beforePut()`
- `beforeDelete()`

Объект доступен как `$this->object`. У `beforePost()` и `beforePut()` возврат `null` равнозначен `true`, у `beforeDelete()` — нет: там `null` прерывает запрос и уходит в `failure()` с пустым сообщением. Возвращайте `true` явно.

Текст, который увидит клиент при возврате `false`, задайте через `setErrorMessage()`; отдельную ошибку поля добавьте через `addFieldError()` или снимите через `removeFieldError()`.

**После чтения/записи**: `afterRead`, `afterPost`, `afterPut` и `afterDelete` получают исходящий массив по ссылке. Меняйте поля там.

**Список:**

- `prepareListQueryBeforeCount(xPDOQuery $c)` / `prepareListQueryAfterCount(xPDOQuery $c)`: join и `where`
- `prepareListObject(xPDOObject $object)`: разметка строки (по умолчанию `toArray()`)
- `addSearchQuery()`: своя логика поиска

**Объект:**

- `getPrimaryKeyCriteria($id)`: критерии выборки для read/update/delete — точка для своих условий и составных ключей
- `setObjectFields(&$object, array $values)`: перенос значений в объект

Ошибки модели подхватываются автоматически: если объект умеет `getErrors()`, они попадают в ответ. Формулировки берутся из лексикона `rest`, который сервис подгружает сам.

**Хелперы:**

- `$this->getProperty($key)` / `setProperty()` / `unsetProperty()` / `setProperties()` / `getProperties()`
- `$this->setHeaders()` / `getHeaders()`
- `$this->setDefault($key, $value)` / `setDefaults(array $values)`
- `$this->checkRequiredFields(array $fields)` — возвращает `true` или текст ошибки
- `$this->checkRequiredRelatedObjects(array $pairs)`
- `$this->success($message, $object, $status)`
- `$this->failure($message, $object, $status)`
- `$this->collection($list, $total, $status)`
- `$this->addFieldError($field, $message)`

Пример: в списке отдавать только часть полей:

```php
protected function prepareListObject(xPDOObject $object)
{
    $row = $object->toArray();
    return [
        'id' => $row['id'],
        'name' => $row['name'],
        'sortorder' => $row['sortorder'],
    ];
}
```

Пример: запретить создание при определённом имени:

```php
public $postRequiredFields = ['name'];

public function beforePost()
{
    if ($this->getProperty('name') === 'blocked') {
        return 'Такое имя нельзя';
    }
    return parent::beforePost();
}
```

## 5. Авторизация и защита

У контроллера по умолчанию `protected $protected = true`. При защите `process()` вызывает `verifyAuthentication()` до метода глагола (кроме `OPTIONS`). Штатный `verifyAuthentication()` возвращает `true`.

На момент `verifyAuthentication()` свойство с ID ещё не заполнено, а `$this->object` ещё `null`: оба появляются позже. Для проверки прав по записи используйте `$this->getProperties()`.

Публичная точка:

```php
protected $protected = false;
```

Своя проверка: оставьте `$protected = true` и переопределите:

```php
public function verifyAuthentication()
{
    $key = $this->getProperty('api_key');
    return $key && $key === $this->modx->getOption('mypackage.api_key');
}
```

Ошибка авторизации даёт HTTP 401 и стандартный error payload. Держите HTTPS и свою схему токена или сессии: механизма OAuth в стеке `modRestService` нет.

`modRestService::checkPermissions()` это отдельный барьер в bootstrap. Для глобальных правил переопределите метод в своём классе сервиса.

## 6. Формат ответа

Формат задаётся суффиксом пути или опцией `defaultResponseFormat`. Из коробки доступны три:

| Суффикс | Content-Type | Тело |
| --- | --- | --- |
| без суффикса, `.json` | `application/json` | JSON |
| `.xml` | `application/xml` | XML с корнем из `xmlRootNode` |
| `.qs` | `text/plain` | URL-кодированная строка |

Тело запроса разбирается по `Content-Type`: `application/json`, `application/xml`, `application/x-www-form-urlencoded` (по умолчанию). При `image/jpeg`, `image/png` или `image/gif` в свойства попадает открытый поток `filehandle`.

При разборе входящего XML пустой XML-элемент в PHP-массиве становится пустой строкой (`''`), а не пустым массивом. [#14305](https://github.com/modxcms/revolution/pull/14305) Контроллеры с `empty()` или строгой проверкой `=== ''` ведут себя так же, как при JSON с `""`.

Тела `success()` / `failure()` используют ключи из конфига сервиса (`success`, `message`, `object`, плюс `errors` при ошибках полей) и всегда содержат `code`. Списки используют `results` и `total`.

HTTP-статус по умолчанию для успеха и ошибки: `200`. Передайте третий аргумент в `success()` / `failure()` или смените `defaultSuccessStatusCode` / `defaultFailureStatusCode`, если нужны коды вроде 201 или 404.

## 7. Вложенные контроллеры

Контроллеры могут лежать в подкаталогах `basePath`. Имя класса по-прежнему собирается из префикса и separator. При пустом separator файл `Controllers/Users/Profile.php` даёт класс вроде `MyControllerUsersProfile` и путь `/rest/users/profile`.

## Смотрите также

- [HTTP-клиент](extending-modx/services/http): исходящие запросы в MODX 3
- [modRest](extending-modx/services/modrest): устаревший исходящий клиент
- [Выборка объектов xPDO](extending-modx/xpdo/retrieving-objects): запросы, которые вы переиспользуете в `prepareListQuery*`
