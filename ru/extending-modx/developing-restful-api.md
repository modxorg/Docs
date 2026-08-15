---
title: "Разработка RESTful API"
translation: "extending-modx/developing-restful-api"
---

MODX даёт небольшой REST-сервер на классах `modRestService` и `modRestController`. Вы направляете HTTP-запросы на bootstrap-скрипт, сопоставляете пути URL с классами контроллеров и получаете CRUD над объектами xPDO плюс хуки для авторизации, валидации и формы ответа.

Страница покрывает MODX 2.3+ и MODX 3.x. В 3.x классы лежат в `MODX\Revolution\Rest\*`. Поведение сервиса и контроллеров совпадает с примерами ниже.

> Исходящие HTTP-запросы из MODX к чужим API — другой стек. См. [HTTP-клиент](extending-modx/services/http). Устаревший клиент `modRest` описан в [Services](extending-modx/services/modrest).

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

Код 405 значит: роутер отработал, контроллер не найден. Дальше добавляйте контроллеры.

### Полезные опции `modRestService`

| Опция | По умолчанию | Назначение |
| --- | --- | --- |
| `basePath` | `base_path` сайта | Каталог файлов контроллеров |
| `controllerClassPrefix` | `modRestController` | Префикс класса из имени файла |
| `controllerClassSeparator` | `''` | Соединитель префикса и сегмента класса |
| `requestParameter` | `_rest` | GET-параметр с путём (`items`, `items/15`) |
| `defaultResponseFormat` | `json` | `json` или `xml`, если суффикса нет |
| `collectionResultsKey` / `collectionTotalKey` | `results` / `total` | Ключи в ответе списка |
| `propertyLimit` / `propertyOffset` | `limit` / `start` | Имена параметров пагинации |
| `propertySort` / `propertySortDir` | `sort` / `dir` | Имена параметров сортировки |
| `propertySearch` | `search` | Имя параметра текстового поиска |
| `defaultSuccessStatusCode` / `defaultFailureStatusCode` | `200` / `200` | HTTP-коды для `success()` / `failure()` |

## 2. Конечные точки API

Один сегмент пути — один тип ресурса. HTTP-глаголы делают работу:

- `GET /items` — список
- `GET /items/15` — чтение по первичному ключу `15`
- `POST /items` — создание
- `PUT /items/15` — обновление
- `DELETE /items/15` — удаление

Пути вроде `/items/create` не нужны. `POST /items` уже означает создание.

При `controllerClassPrefix => 'MyController'` и пустом separator файл `rest/Controllers/Items.php` должен объявлять класс `MyControllerItems`.

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

### Параметры списка

Значения по умолчанию из конфига сервиса:

| Параметр | Назначение |
| --- | --- |
| `limit` | Размер страницы (`$defaultLimit` контроллера, обычно `20`) |
| `start` | Смещение |
| `sort` | Поле сортировки (иначе `$defaultSortField`) |
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
| `$defaultSortField` / `$defaultSortDirection` | Сортировка списка по умолчанию |
| `$defaultLimit` / `$defaultOffset` | Пагинация по умолчанию |
| `$searchFields` | Поля для параметра `search` |
| `$postRequiredFields` / `$putRequiredFields` / `$deleteRequiredFields` | Обязательные поля запроса |
| `$postRequiredRelatedObjects` / `$putRequiredRelatedObjects` | Карта `field => classKey`, объекты должны существовать |
| `$postMethod` / `$putMethod` / `$deleteMethod` | Методы объекта для записи (`save` / `save` / `remove`) |
| `$allowedMethods` | Допустимые HTTP-глаголы |

## 4. Хуки и форма ответа

Стандартные `get` / `post` / `put` / `delete` закрывают обычный сценарий. Хуки нужны для фильтров, прав и другого payload.

**До записи/удаления** — верните `true`, чтобы продолжить, или `false` / строку ошибки, чтобы остановить:

- `beforePost()`
- `beforePut()`
- `beforeDelete()`

Объект доступен как `$this->object`.

**После чтения/записи** — `afterRead`, `afterPost`, `afterPut` и `afterDelete` получают исходящий массив по ссылке. Меняйте поля там.

**Список:**

- `prepareListQueryBeforeCount(xPDOQuery $c)` / `prepareListQueryAfterCount(xPDOQuery $c)` — join и `where`
- `prepareListObject(xPDOObject $object)` — разметка строки (по умолчанию `toArray()`)
- `addSearchQuery()` — своя логика поиска

**Хелперы:**

- `$this->getProperty($key)` / `setProperty()` / `getProperties()`
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

Публичная точка:

```php
protected $protected = false;
```

Своя проверка — оставьте `$protected = true` и переопределите:

```php
public function verifyAuthentication()
{
    $key = $this->getProperty('api_key');
    return $key && $key === $this->modx->getOption('mypackage.api_key');
}
```

Ошибка авторизации даёт HTTP 401 и стандартный error payload. Держите HTTPS и свою схему токена или сессии. OAuth в этом стеке ядро не поставляет.

`modRestService::checkPermissions()` — отдельный барьер в bootstrap. Для глобальных правил переопределите метод в своём классе сервиса.

## 6. Формат ответа

По умолчанию JSON. XML запрашивайте суффиксом `.xml` (`/rest/items.xml`) или через `defaultResponseFormat => 'xml'`.

Тела success/failure используют ключи из конфига сервиса (`success`, `message`, `object`, плюс `errors` при ошибках полей). Списки используют `results` и `total`.

HTTP-статус по умолчанию для успеха и ошибки — `200`. Передайте третий аргумент в `success()` / `failure()` или смените `defaultSuccessStatusCode` / `defaultFailureStatusCode`, если нужны коды вроде 201 или 404.

## 7. Вложенные контроллеры

Контроллеры могут лежать в подкаталогах `basePath`. Имя класса по-прежнему собирается из префикса и separator. При пустом separator файл `Controllers/Users/Profile.php` даёт класс вроде `MyControllerUsersProfile` и путь `/rest/users/profile`.

## Смотрите также

- [HTTP-клиент](extending-modx/services/http) — исходящие запросы в MODX 3
- [modRest](extending-modx/services/modrest) — устаревший исходящий клиент
- [Выборка объектов xPDO](extending-modx/xpdo/retrieving-objects) — запросы, которые вы переиспользуете в `prepareListQuery*`
