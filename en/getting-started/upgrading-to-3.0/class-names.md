---
title: Changed Class Names
note: This list may be incomplete, please edit this page to help make it complete.
---

To implement namespaces, 3.0 renamed and moved many files and classes. You may see warnings or errors (including fatal errors) when you:

- `include`/`require` a file that is no longer there
- extend one of these classes
- type hint against these classes

## Model & Service Classes

Most model and service classes loaded through `$modx->loadClass` (including the xPDO Query builder) or `$modx->getService` still work: `loadClass` translates the old names internally. `$modx->getIterator('modResource')` still resolves — and logs a deprecation. Prefer `$modx->getIterator(\MODX\Revolution\modResource::class)`.

`$modx->getService()` itself is **deprecated** in 3.x but was **not** removed in 3.1; the core still uses it. For new code, register and fetch objects on `$modx->services`. See [modX.getService](extending-modx/modx-class/reference/modx.getservice) and the [DI container](extending-modx/di-container).

### Type checks against old names

With the deprecated global class aliases loaded (the default), the old name is a real class, so `instanceof modResource` works. Disable `load_deprecated_global_class_aliases` (see below) and two things change:

- a type hint (`public function(modResource $foo)`) fails outright
- `instanceof modResource` silently evaluates to `false`, because PHP allows `instanceof` against a class that does not exist

To cover both cases, check both names:

```php
if ($foo instanceof modResource || $foo instanceof \MODX\Revolution\modResource) {
```

This works whether or not the aliases are loaded.

## Changed classes, with upgrade path

These commonly used classes are aliased to their new names. The aliases load in `modX::loadConfig` when `load_deprecated_global_class_aliases` is `true` (the default). To disable them, add the key with a value of `false` to `$config_options` in `core/config/config.inc.php`.


**Automatic loading of these aliases will stop in a future 3.x release — the source comment in `core/include/deprecated.php` says "likely 3.3 or 3.4".** If you still need the aliases after that, you can manually require `core/include/deprecated.php` as a stopgap, but update your code to the new classes anyway. The backwards-compatibility layer itself (including manual loading) will likely be removed in MODX 4.0.

### xPDO

| New Class                         | Old Class          |
| --------------------------------- | ------------------ |
| \xPDO\xPDO                        | \xPDO              |
| \xPDO\Om\xPDOCriteria             | \xPDOCriteria      |
| \xPDO\Om\xPDOSimpleObject         | \xPDOSimpleObject  |
| \xPDO\Om\xPDOQuery                | \xPDOQuery         |
| \xPDO\Om\xPDOObject               | \xPDOObject        |
| \xPDO\Cache\xPDOCacheManager      | \xPDOCacheManager  |
| \xPDO\Cache\xPDOFileCache         | \xPDOFileCache     |
| \xPDO\Transport\xPDOTransport     | \xPDOTransport     |
| \xPDO\Transport\xPDOObjectVehicle | \xPDOObjectVehicle |

How Composer, PSR-4, `metadata.mysql.php`, and Extra `addPackage` calls fit together: [xPDO 3](getting-started/upgrading-to-3.0/xpdo).

### MODX Core & Controllers

| New Class                                   | Old Class                   |
| ------------------------------------------- | --------------------------- |
| \MODX\Revolution\modX                       | \modX                       |
| \MODX\Revolution\modManagerController       | \modManagerController       |
| \MODX\Revolution\modParsedManagerController | \modParsedManagerController |
| \MODX\Revolution\modExtraManagerController  | \modExtraManagerController  |

### MODX Model Classes

| New Class                    | Old Class    |
| ---------------------------- | ------------ |
| \MODX\Revolution\modResource | \modResource |

### Services, interfaces and utilities

| New Class                                            | Old Class                     |
| ---------------------------------------------------- | ----------------------------- |
| \MODX\Revolution\modParser                           | \modParser                    |
| \MODX\Revolution\Mail\modMail                        | \modMail                      |
| \MODX\Revolution\Mail\modPHPMailer                   | \modPHPMailer                 |
| \MODX\Revolution\Sources\modMediaSource              | \modMediaSource               |
| \MODX\Revolution\modSystemEvent                      | \modSystemEvent               |
| \MODX\Revolution\modTemplateVarInputRender           | \modTemplateVarInputRender    |
| \MODX\Revolution\modTemplateVarOutputRender          | \modTemplateVarOutputRender   |
| \MODX\Revolution\modDashboardWidgetInterface         | \modDashboardWidgetInterface  |

### Processors

All processors, including the base classes (`\modProcessor`, `\modObjectProcessor`, `\modObject*Processor`, `\modProcessorResponse`, `\modProcessorResponseError`), have been renamed and moved. Old names have aliases for now; flat-file processors are gone. See the [processors page](getting-started/upgrading-to-3.0/processors).

## Changed classes, without upgrade path

Every other model and service class has no alias. This includes the everyday objects from `getObject`/`getCollection`, such as `\MODX\Revolution\modContext`, `\MODX\Revolution\modUser`, `\MODX\Revolution\modChunk`, `\MODX\Revolution\modSnippet`, `\MODX\Revolution\modPlugin` and `\MODX\Revolution\modTemplate`.

## Removed classes

These classes were removed from 3.0 with no alternative:

- `modDeprecatedProcessor`
- `modParser095`
- `modTranslate095`
- `modTranslator`
- All classes and functions related to the `xmlrss` service/utility: `Snoopy`, `MagpieRSS`, `modRSSParser`, `RSSCache`, function `parse_w3cdtf`, function `fetch_rss`. To fetch RSS feeds, use SimplePie.
- All classes and functions related to the `xmlrpc` and `jsonrpc` services/utilities: `modXMLRPCResponse`, `modJSONRPCResponse`, `modXMLRPCResource` (+ platform classes), `modJSONRPCResource` (+ platform classes)
- `modManagerControllerDeprecated`

Flash clipboard helpers used by ExtJS for copy-to-clipboard are gone; use the browser clipboard APIs instead [#13697](https://github.com/modxcms/revolution/pull/13697).

## Signature changes

- `modResponse::_construct` (and inherited `modManagerResponse`/`modConnectorResponse`) is now `public` and no longer uses the ampersand: objects are always passed by reference.
- `Processor::getInstance` and `modManagerController::getInstance` no longer pass modX by reference with the ampersand.
