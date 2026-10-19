---
title: "Developing RESTful APIs"
description: "Build a REST API in MODX Revolution with modRestService and modRestController: bootstrap, routes, CRUD, hooks, authentication, and response formats."
_old_id: "1728"
_old_uri: "2.x/developing-in-modx/advanced-development/developing-rest-servers"
---

MODX ships a small REST server stack built around `modRestService` and `modRestController`. You point HTTP requests at a bootstrap script, map URL paths to controller classes, and get CRUD behaviour over xPDO objects with hooks for auth, validation, and response shaping.

This page covers MODX 2.x and MODX 3.x. Class locations changed in 3.x (`MODX\Revolution\Rest\*`). The public controller API matches across versions, the service config does not: 3.x adds `sanitize`, 2.x has `xmlDisableEntityLoader`.

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

::: warning
`process()` does not return a response — it sends the payload and ends the script (`exit(0)`). Nothing after the call runs, and callers must read the result from the output. Set `exitOnResponse => false` to keep control.
:::

A request with no path segment (`/rest/`) routes to the `Index` controller; the name comes from the `defaultAction` option.

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

That 405 with the message `Method not allowed` means the router ran and found no matching controller. Next step: add controllers.

### Useful `modRestService` options

| Option | Default | Role |
| --- | --- | --- |
| `basePath` | site `base_path` | Directory of controller files |
| `controllerClassPrefix` | `modRestController` | Prefix prepended to the class loaded from the file name |
| `controllerClassSeparator` | `''` | Joiner between prefix and class segment |
| `controllerClassFilePostfix` | `.php` | Extension used when scanning directories |
| `defaultAction` | `index` | Controller for a request with no path segment |
| `requestParameter` | `_rest` | Query param that carries the path (`items`, `items/15`) |
| `defaultResponseFormat` | `json` | Format used when no suffix is present |
| `supportedFormats` | `xml,json,qs` | Suffixes recognised as formats |
| `checkForSuffix` | `true` | Whether to parse a format suffix from the path |
| `collectionResultsKey` / `collectionTotalKey` | `results` / `total` | Keys in list responses |
| `propertyLimit` / `propertyOffset` | `limit` / `start` | Query param names for pagination |
| `propertySort` / `propertySortDir` | `sort` / `dir` | Query param names for sorting |
| `propertySearch` | `search` | Query param name for text search |
| `defaultSuccessStatusCode` / `defaultFailureStatusCode` | `200` / `200` | HTTP status codes used by `success()` / `failure()` |
| `responseSuccessKey` / `responseMessageKey` / `responseObjectKey` / `responseErrorsKey` | `success` / `message` / `object` / `errors` | Keys in a controller response body |
| `errorMessageSeparator` | `' '` | Separator between field errors |
| `trimParameters` | `false` | Trim whitespace from string request parameters |
| `sanitize` | `false` | 3.x only: run parameters through `modX::sanitize()` |
| `exitOnResponse` | `true` | End the script after sending the response |
| `xmlRootNode` | `response` | Root node of XML output |

An unknown suffix is not an error — the request falls back to `defaultResponseFormat`. Service-level error codes (`400`, `401`, `405`, `500`) always carry the keys `success`, `message`, `object`, and `code`; the `response*Key` options do not affect them.

## 2. Building API endpoints

Map one path segment to one resource type. HTTP verbs do the work:

- `GET /items`: list
- `GET /items/15`: read primary key `15`
- `POST /items`: create
- `PUT /items/15`: update
- `DELETE /items/15`: delete

Skip paths like `/items/create`. `POST /items` already means create.

With `controllerClassPrefix => 'MyController'` and empty separator, file `rest/Controllers/Items.php` must define class `MyControllerItems`. Path matching is case-insensitive: `/rest/Items` and `/rest/items` reach the same controller.

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

A controller without a method for the requested verb returns `405 Unsupported HTTP method`. A class that cannot be instantiated (an abstract base, for instance) returns `400`. If the verb method never calls `success()`, `failure()`, or `collection()`, the service answers with a second `405` instead of your payload.

Parameters are collected per verb: `GET` reads the query string only, `POST` merges the query string with the body, `PUT` uses `$_POST` and the body (query string ignored), `DELETE` merges the query string with the body.

### List query parameters

Defaults from the service config:

| Param | Purpose |
| --- | --- |
| `limit` | Page size (`$defaultLimit`, default `20`) |
| `start` | Offset |
| `sort` | Field name (falls back to `$defaultSortField`, default `name`) |
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
| `$defaultSortField` / `$defaultSortDirection` | Default list sorting (`name` and `ASC`) |
| `$defaultLimit` / `$defaultOffset` | Default pagination (`20` and `0`) |
| `$searchFields` | Fields searched when `search` is present |
| `$postRequiredFields` / `$putRequiredFields` / `$deleteRequiredFields` | Required request fields |
| `$postRequiredRelatedObjects` / `$putRequiredRelatedObjects` | Map of `field => classKey` that must exist |
| `$postMethod` / `$putMethod` / `$deleteMethod` | Object methods called to persist (`save` / `save` / `remove`) |
| `$allowedMethods` | Verbs advertised in `Access-Control-Allow-Methods` on `OPTIONS` |
| `$allowedHeaders` | Headers advertised in `Access-Control-Allow-Headers` (default `Content-Type`) |

::: warning
`$allowedMethods` does not restrict requests. A verb is accepted only when the controller defines a method of that name; anything else returns `405`. The list feeds the CORS header and nothing else.
:::

Do not override the controller constructor — the service instantiates the class.

## 4. Hooks and response shaping

Default `get` / `post` / `put` / `delete` already handle the happy path. Override hooks when you need filters, permissions, or a different payload.

**Initialisation**: `initialize()` runs after the auth check and before the verb method — a good place for shared controller setup.

**Before write/delete**: return `true` to continue, or `false` / an error string to abort:

- `beforePost()`
- `beforePut()`
- `beforeDelete()`

The object sits on `$this->object`. A `null` return means "continue" in `beforePost()` and `beforePut()`, but not in `beforeDelete()`: there `null` aborts the request and reaches `failure()` with an empty message. Return `true` explicitly.

Set the text the client sees on a `false` return with `setErrorMessage()`; add or drop individual field errors with `addFieldError()` / `removeFieldError()`.

**After read/write**: `afterRead`, `afterPost`, `afterPut`, and `afterDelete` receive the outgoing array by reference. Change fields there before the response leaves.

**List customisation:**

- `prepareListQueryBeforeCount(xPDOQuery $c)` / `prepareListQueryAfterCount(xPDOQuery $c)`: add joins or `where` clauses
- `prepareListObject(xPDOObject $object)`: map each row (default `toArray()`)
- `addSearchQuery()`: override search behaviour

**Object access:**

- `getPrimaryKeyCriteria($id)`: read/update/delete criteria — the place for custom conditions and composite keys
- `setObjectFields(&$object, array $values)`: copy values onto the object

Model errors are picked up automatically: when the object implements `getErrors()`, they reach the response. Wording comes from the `rest` lexicon, which the service loads itself.

**Helpers you call from overrides:**

- `$this->getProperty($key)` / `setProperty()` / `unsetProperty()` / `setProperties()` / `getProperties()`
- `$this->setHeaders()` / `getHeaders()`
- `$this->setDefault($key, $value)` / `setDefaults(array $values)`
- `$this->checkRequiredFields(array $fields)` — returns `true` or an error string
- `$this->checkRequiredRelatedObjects(array $pairs)`
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

Example: reject creates for one reserved name:

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

At that point the ID property is still unset and `$this->object` is still `null` — both arrive later. Read `$this->getProperties()` for payload-based permission checks.

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

Failed auth becomes HTTP 401 with the standard error payload. Pair this with HTTPS and your own token or session scheme; `modRestService` ships no OAuth mechanism.

`modRestService::checkPermissions()` is a separate gate that runs in your bootstrap when you call it. Override that method on a custom service class for global rules.

## 6. Response format

The format comes from a path suffix or from `defaultResponseFormat`. Three ship out of the box:

| Suffix | Content-Type | Body |
| --- | --- | --- |
| none, `.json` | `application/json` | JSON |
| `.xml` | `application/xml` | XML rooted at `xmlRootNode` |
| `.qs` | `text/plain` | URL-encoded string |

Request bodies are parsed by `Content-Type`: `application/json`, `application/xml`, or `application/x-www-form-urlencoded` (the default). With `image/jpeg`, `image/png`, or `image/gif` the properties receive an open `filehandle` stream.

When the service parses inbound XML request bodies, an empty XML element becomes an empty string (`''`) in the resulting PHP array, not an empty array. [#14305](https://github.com/modxcms/revolution/pull/14305) Controllers that treat "empty" with `empty()` or strict `=== ''` checks stay consistent with JSON clients sending `""`.

`success()` and `failure()` bodies use the keys from the service config (`success`, `message`, `object`, plus `errors` when field errors exist) and always carry `code`. List calls use `results` and `total`.

Default HTTP status for both success and failure is `200`. Pass a third argument to `success()` / `failure()`, or change `defaultSuccessStatusCode` / `defaultFailureStatusCode`, when you need 201/404-style codes.

## 7. Nested controllers

Controllers may live in subfolders under `basePath`. The class name still uses the configured prefix and separator. With an empty separator, `Controllers/Users/Profile.php` maps to a class like `MyControllerUsersProfile` and path `/rest/users/profile`.

## See also

- [HTTP Client](extending-modx/services/http): outbound requests from MODX 3
- [modRest](extending-modx/services/modrest): deprecated outbound client
- [xPDO retrieving objects](extending-modx/xpdo/retrieving-objects): query patterns you reuse in `prepareListQuery*`
