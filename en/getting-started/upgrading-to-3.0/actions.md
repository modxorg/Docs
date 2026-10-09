---
title: 'modAction and related'
---

Manager URLs like `/manager/?a=15` (where `15` is an action ID) no longer work in MODX 3. Extras must use namespace-based routing: `/manager/?namespace=myextra&a=action`. The landing page after login is controlled by the `welcome_action` and `welcome_namespace` settings.

For some extras, this means rewriting controllers; for others, changing the menu definition (in Admin > Menus) is enough.


`modAction` and `modAccessAction` are gone (see [Removed objects](#removed-objects) below). `modActionDom`, `modAccessActionDom`, `modActionField` and the `actiondom` / `access_actiondom` / `actions_fields` tables remain and still serve Form Customization rules. The cleanup also touched the `modManagerResponse` and `modManagerController` classes.

## Removed: `MODX.action` (JavaScript)

The `MODx.action` JavaScript variable in the manager is gone. Accessing it without checking whether it exists may throw an error.

## Removed: `modX::$actionMap` and `modCacheManager::generateActionMap()`

The action map served the old action system. It and the method that generated it are gone.

## Removed: `modManagerRequest::loadActionMap()`

Filled `modX::$actionMap`; removed with the map.

## Changed: parameters passed to OnBeforeManagerPageInit event

[OnBeforeManagerPageInit](extending-modx/plugins/system-events/onbeforemanagerpageinit) used to receive `$action` as an array. It now receives the controller configuration array:

- `namespace` — the namespace for the request
- `namespace_path` — the core path for the namespace
- `action` — the router/action in the namespace
- `controller` — the controller name resolved for the request


## Removed: `MODX_INCLUDES_PATH` constant

No known uses of this constant, so it has been removed.

## Changed: throwing exceptions

When initialising a controller, you can throw `MODX\Revolution\Controllers\Exceptions\NotFoundException` or `MODX\Revolution\Controllers\Exceptions\AccessDeniedException`. `modManagerResponse` catches them and shows a proper error page. Provide a useful message in the exception.

A falsey return value from `modManagerController::checkPermissions` is also handled, but it cannot carry a custom message — throw the exception for that.

`\Exception`s and `\Error`s thrown while rendering a controller are now caught as well.

## Removed: `loadControllerClass` and `instantiateController` on `modManagerResponse`

Controller loading in `modManagerResponse` was refactored; both methods are gone.

Controllers may now live in the autoloaded `\MODX\Revolution\Controllers\` namespace: `getControllerClassName()` looks for `\MODX\Revolution\Controllers\{action}` first, then falls back to the filesystem lookup in `{namespace_path}/controllers/`. If your controller class is autoloadable there, no other wiring is needed.

Some signatures changed:

- `checkForMenuPermissions(string $action): bool` — the parameter type and return type are now declared
- `getControllerClassName(string $action): string` — `$action` is required; the method returns a string or throws a `NotFoundException`

## Removed objects

- `modAccessAction` (`access_actions` table)
- `modAction` (`actions` table)
