---
title: "modX.getService"
description: "getService loads a named service class. Deprecated in 3.x in favour of the DI container."
---

## modX::getService

**Deprecated in MODX 3.x.** xPDO marks `getService()` as deprecated and points you at the service / DI container (`$modx->services`). PhpStorm therefore warns that it will be removed in 3.1. That removal **did not happen**. The method still exists on current 3.x, and the core still calls it. Prefer `$modx->services` in new code. See [Dependency Injection Container](extending-modx/di-container).

`getService` lives on xPDO (modX extends xPDO). It loads and returns a named service instance, or `null` if it cannot load the class. The instance is created once. Later calls return the stored object. Internally 3.x stores that object in `$modx->services` as well.

## Syntax

``` php
object getService (string $name, [string $class = ''], [string $path = ''], [array $params = array ()])
```

- `$name` _(string)_ key that identifies the service.
- `$class` _(string)_ class name for `new`, or dot notation for subfolders under `$path`.
- `$path` _(string)_ directory that contains the class file.
- `$params` _(array)_ second constructor argument. The first argument is always the xPDO/MODX instance.

Defined in [`xPDO::getService()`](https://github.com/modxcms/xpdo/blob/3.x/src/xPDO/xPDO.php).

## Examples (still work)

Get the Smarty service:

``` php
$modx->getService('smarty','smarty.modSmarty');
```

Custom service with a path and constructor params:

``` php
$modx->getService('twitter','modTwitter','/path/to/',array(
  'api_key' => 3212423,
));
$modx->twitter->tweet('Success!');
```

Inside an Extra:

``` php
// Path points at the class directory:
if(!$Product = $this->modx->getService('mypkg.product','Product',MODX_CORE_PATH.'components/mypkg/model/mypkg/')) {
    return 'NOT FOUND';
}
// Or use dot notation and point $path at the model directory:
if(!$Product = $this->modx->getService('mypkg.product','mypkg.Product',MODX_CORE_PATH.'components/mypkg/model/')) {
    return 'NOT FOUND';
}
```

`getService` can struggle with PHP namespaces. Pass a fully qualified class name, or register the object on the container yourself.

## Replacement in MODX 3

Use `$modx->services` (`has` / `add` / `get`). Core does the same in `modX::runProcessor()` for lexicon and error.

Register a core-style service (example: `modError`):

``` php
use MODX\Revolution\Error\modError;

if (!$modx->services->has('error')) {
    $modx->services->add('error', new modError($modx));
}
$modx->error = $modx->services->get('error');
```

Custom Extra: instantiate the class (Composer / namespace autoload) and add it. A [Namespace `bootstrap.php`](extending-modx/namespaces) is the usual place:

``` php
$modx->services->add('twitter', function($c) use ($modx) {
    return new MyPackage\Twitter($modx, ['api_key' => 3212423]);
});
```

Then:

``` php
$twitter = $modx->services->get('twitter');
$twitter->tweet('Success!');
```

`modError` (`$modx->error`) and `modErrorHandler` (`$modx->errorHandler`) are different services. Do not mix the keys.

## See Also

- [modX](extending-modx/core-model/modx)
- [MODX Services](extending-modx/services)
- [Dependency Injection Container](extending-modx/di-container)
- [xPDO.loadClass](extending-modx/xpdo/class-reference/xpdo/xpdo.loadclass) loads a class without instantiating it
