---
title: "Developing RESTful APIs"
_old_id: "1728"
_old_uri: "2.x/developing-in-modx/advanced-development/developing-rest-servers"
---

MODX ships a small REST server stack built around `modRestService` and `modRestController`. You point HTTP requests at a bootstrap script, map URL paths to controller classes, and get CRUD behaviour over xPDO objects with hooks for auth, validation, and response shaping.

This page covers MODX 2.3+ and MODX 3.x. Class locations changed in 3.x (`MODX\Revolution\Rest\*`). Behaviour of the service and controllers matches the examples below.

> Outgoing HTTP from MODX to third-party APIs is a different stack. See [HTTP Client](extending-modx/services/http). The deprecated `modRest` client is documented under [Services](extending-modx/services/modrest).

## Recommended reading

Phil Sturgeon's *[Build APIs you won't hate](https://leanpub.com/build-apis-you-wont-hate)* is a solid primer on REST conventions before you wire controllers.

## In a nutshell

1. Create `rest/index.php` that boots MODX, configures `modRestService`, then calls `prepare()` and `process()`.
2. Route `/rest/*` to that script (Apache `.htaccess` inside `rest/`, or an nginx `location`).
3. Add one controller class per endpoint under `rest/Controllers/`.

## 1. Bootstrapping the API

Place the API under `/rest/` (adjust paths if you use another folder).

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

`checkPermissions()` on the service returns `true` by default. Override it on a custom service subclass (or gate traffic earlier) when every request must pass a site-wide check. Per-controller auth uses `verifyAuthentication()` (see below).

### URL rewriting

Put rewrite rules **inside** `rest/` so the rest of the site keeps normal routing.

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

Open `/rest/foobar` in a browser. A working bootstrap returns JSON like:

```json
{
    "success": false,
    "message": "Method not allowed",
    "object": [],
    "code": 405
}
```

That 405 means the router ran and found no matching controller. Next step: add controllers.

### Useful `modRestService` options

| Option | Default | Role |
| --- | --- | --- |
| `basePath` | site `base_path` | Directory of controller files |
| `controllerClassPrefix` | `modRestController` | Prefix prepended to the class loaded from the file name |
| `controllerClassSeparator` | `''` | Joiner between prefix and class segment |
| `requestParameter` | `_rest` | Query param that carries the path (`items`, `items/15`) |
| `defaultResponseFormat` | `json` | `json` or `xml` when no suffix is present |
| `collectionResultsKey` / `collectionTotalKey` | `results` / `total` | Keys in list responses |
| `propertyLimit` / `propertyOffset` | `limit` / `start` | Query param names for pagination |
| `propertySort` / `propertySortDir` | `sort` / `dir` | Query param names for sorting |
| `propertySearch` | `search` | Query param name for text search |
| `defaultSuccessStatusCode` / `defaultFailureStatusCode` | `200` / `200` | HTTP status codes used by `success()` / `failure()` |

## 2. Building API endpoints

Map one path segment to one resource type. HTTP verbs do the work:

- `GET /items` — list
- `GET /items/15` — read primary key `15`
- `POST /items` — create
- `PUT /items/15` — update
- `DELETE /items/15` — delete

Skip paths like `/items/create`. `POST /items` already means create.

With `controllerClassPrefix => 'MyController'` and empty separator, file `rest/Controllers/Items.php` must define class `MyControllerItems`.

### MODX 3.x controller

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

### MODX 2.x controller

```php
<?php
class MyControllerItems extends modRestController
{
    public $classKey = 'ToDoItem';
    public $defaultSortField = 'sortorder';
    public $defaultSortDirection = 'ASC';
}
```

Load the package with `addPackage()` (or your Extra's service) before `process()` so `ToDoItem` resolves. For a quick experiment without a custom package, set `$classKey = 'modResource'` (or `\MODX\Revolution\modResource` in 3.x) and `$defaultSortField = 'id'`.

`GET /rest/items` then returns a collection:

```json
{
    "results": [
        {
            "id": 1,
            "sortorder": 1,
            "name": "Finish documenting RESTful APIs",
            "added": "2014-09-14",
            "target_completion_date": "2014-10-14",
            "assigned_to": ""
        }
    ],
    "total": 1
}
```

`GET /rest/items/1`, `POST`, `PUT`, and `DELETE` work from the same class. Use curl or an API client to send non-GET verbs.

### Request routing

| Request | Controller entry |
| --- | --- |
| `GET /items` | `get()` → `getList()` |
| `GET /items/5` | `get()` → `read($id)` |
| `POST /items` | `post()` |
| `PUT /items/5` | `put()` |
| `DELETE /items/5` | `delete()` |

The ID segment is copied onto `$this->primaryKeyField` (default `id`) before the method runs.

### List query parameters

Defaults from the service config:

| Param | Purpose |
| --- | --- |
| `limit` | Page size (controller `$defaultLimit`, default `20`) |
| `start` | Offset |
| `sort` | Field name (falls back to `$defaultSortField`) |
| `dir` | `ASC` or `DESC` |
| `search` | LIKE filter across `$searchFields` |

Example: `/rest/items?limit=10&start=0&sort=name&dir=ASC&search=docs`

## 3. Controller properties

Set these on your controller class to drive the default CRUD path:

| Property | Role |
| --- | --- |
| `$classKey` | xPDO class to load |
| `$classAlias` | Optional query alias |
| `$primaryKeyField` | Field used for read/update/delete (default `id`) |
| `$defaultSortField` / `$defaultSortDirection` | Default list sorting |
| `$defaultLimit` / `$defaultOffset` | Default pagination |
| `$searchFields` | Fields searched when `search` is present |
| `$postRequiredFields` / `$putRequiredFields` / `$deleteRequiredFields` | Required request fields |
| `$postRequiredRelatedObjects` / `$putRequiredRelatedObjects` | Map of `field => classKey` that must exist |
| `$postMethod` / `$putMethod` / `$deleteMethod` | Object methods called to persist (`save` / `save` / `remove`) |
| `$allowedMethods` | HTTP verbs this controller accepts |

## 4. Hooks and response shaping

Default `get` / `post` / `put` / `delete` already handle the happy path. Override hooks when you need filters, permissions, or a different payload.

**Before write/delete** — return `true` to continue, or `false` / an error string to abort:

- `beforePost()`
- `beforePut()`
- `beforeDelete()`

The object sits on `$this->object`.

**After read/write** — `afterRead`, `afterPost`, `afterPut`, and `afterDelete` receive the outgoing array by reference. Change fields there before the response leaves.

**List customisation:**

- `prepareListQueryBeforeCount(xPDOQuery $c)` / `prepareListQueryAfterCount(xPDOQuery $c)` — add joins or `where` clauses
- `prepareListObject(xPDOObject $object)` — map each row (default `toArray()`)
- `addSearchQuery()` — override search behaviour

**Helpers you call from overrides:**

- `$this->getProperty($key)` / `setProperty()` / `getProperties()`
- `$this->success($message, $object, $status)`
- `$this->failure($message, $object, $status)`
- `$this->collection($list, $total, $status)`
- `$this->addFieldError($field, $message)`

Example: expose only a subset of fields on list responses:

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

Example: block creates unless a field is present:

```php
public $postRequiredFields = ['name'];

public function beforePost()
{
    if ($this->getProperty('name') === 'blocked') {
        return 'That name is not allowed';
    }
    return parent::beforePost();
}
```

## 5. Authentication and protection

Each controller has `protected $protected = true` by default. When protected, `process()` calls `verifyAuthentication()` before the verb method (except `OPTIONS`). The stock `verifyAuthentication()` returns `true`.

For a public endpoint, set:

```php
protected $protected = false;
```

For a real check, keep `$protected = true` and override:

```php
public function verifyAuthentication()
{
    $key = $this->getProperty('api_key');
    return $key && $key === $this->modx->getOption('mypackage.api_key');
}
```

Failed auth becomes HTTP 401 with the standard error payload. Pair this with HTTPS and your own token or session scheme. The core does not ship OAuth for this stack.

`modRestService::checkPermissions()` is a separate gate that runs in your bootstrap when you call it. Override that method on a custom service class for global rules.

## 6. Response format

JSON is the default. Request XML with a `.xml` suffix when the format is enabled (`/rest/items.xml`), or set `defaultResponseFormat` to `xml`.

Success and failure bodies use keys from the service config (`success`, `message`, `object`, plus `errors` when field errors exist). List calls use `results` and `total`.

Default HTTP status for both success and failure is `200`. Pass a third argument to `success()` / `failure()`, or change `defaultSuccessStatusCode` / `defaultFailureStatusCode`, when you need 201/404-style codes.

## 7. Nested controllers

Controllers may live in subfolders under `basePath`. The class name still uses the configured prefix and separator. With an empty separator, `Controllers/Users/Profile.php` maps to a class like `MyControllerUsersProfile` and path `/rest/users/profile`.

## See also

- [HTTP Client](extending-modx/services/http) — outbound requests from MODX 3
- [modRest](extending-modx/services/modrest) — deprecated outbound client
- [xPDO retrieving objects](extending-modx/xpdo/retrieving-objects) — query patterns you reuse in `prepareListQuery*`
