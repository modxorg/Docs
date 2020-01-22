---
title: 'modAction and related'
---

All `modAction` related functionality has been removed in MODX3. This was accompanied by a cleanup of the `modManagerResponse` and `modManagerController` classes. 

This means that manager URLs in the form of `/manager/?a=15` (where `15` is the ID of an action) will no longer work. Extras that rely on it must be updated to use namespace-based routing instead, in the form of `/manager/?namespace=myextra&a=action`. 

For some extras, this may require rewriting controllers. For others, simply changing the menu definition (in System > Menus) is sufficient.

## Removed: `MODx.action` (JavaScript)

The `MODx.action` javascript variable in the manager is no longer available and may cause an error when accessed without checking if it exists.

## Removed: `modX::$actionMap`

With the removal of actions, the actionMap no longer serves a purpose, and has been removed. 

## Removed: `modCacheManager::generateActionMap()`

Along with `modX::$actionMap`, the method that generates it `modCacheManager::generateActionMap()` has also been removed. 

## Removed: `modManagerRequest::loadActionMap()`

Used to fill `modX::$actionMap`, has been removed.

## Changed: parameters passed to OnBeforeManagerPageInit event

Previously, [OnBeforeManagerPageInit](extending-modx/plugins/system-events/onbeforemanagerpageinit) received an `$action` parameter as an array. Now, it includes the following parameters:

- `string $namespace` the namespace for the request
- `string $namespacePath` the (core) path for the namespace
- `string $action` the router/action in the namespace

## Removed: `MODX_INCLUDES_PATH` constant

No known uses of this constant, so it has been removed.

## Changed: throwing exceptions 

When initialising a controller, you can now throw a new exception `MODX\Revolution\Controllers\Exceptions\NotFoundException` or `MODX\Revolution\Controllers\Exceptions\AccessDeniedException`. These will be handled by the `modManagerResponse` class to show a nicer error page.

Make sure to provide a useful message in the exception.

This also supports returning a falsey return value from `modManagerController::checkPermissions`, but that does not allow providing a custom message unless you throw the exception yourself.

`\Exception`s and `\Error`s triggered by the rendering of a controller will also be caught now. 

## Removed: `loadControllerClass` and `instantiateController` on `modManagerResponse`

As the logic for loading controllers has been refactored in `modManagerResponse`, the `loadControllerClass` and `instantiateController` methods have been removed. 

Some signatures have slightly changed:

- `checkForMenuPermissions(string $action): bool` now defines the `string` parameter type and `bool` return type 
- `getControllerClassName(string $action): string` now requires the `$action` to be provided and either returns a string or throws a `NotFoundException`. 

## Removed objects

- `modAccessAction` (`access_actions` table)
- `modAction` (`actions` table)

