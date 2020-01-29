---
title: Changed Class Names
note: This list may be incomplete, please edit this page to help make it complete.
---

In order to implement namespaces and make sense of certain code, a lot of files and classes were renamed and moved in 3.0. This leads to potential breaking changes.

You may encounter warnings or errors (including fatal errors) in certain cases:

-   when using a direct `include`/`require` statements targeting any relevant file that is no longer there
-   when extending one of these classes
-   when type hinting against these classes

## Model & Service Classes

Most model and service classes that are loaded through `$modx->loadClass` (which includes the xPDO Query builder for model classes) or `$modx->getService` will still work, as `loadClass` internally translates these to their new class names.

For example `$modx->getIterator('modResource')` will still work - _for now_, even though the `\modResource` class is now `\MODX\Revolution\modResource`.

That will log a deprecated message to your error log encouraging you to update your reference. The right call would be `$modx->getIterator(\MODX\Revolution\modResource::class)`.

It is important to note that if you're **type checking** the result of such a call (e.g. `if ($foo instanceof modResource)`), you may not immediately encounter an error (compared to typehinting, like `public function(modResource $foo)`, which does cause an error), but that **will evaluate to `false`** because the old class name does not exist anymore, so that check always fails.

You can type check against non-existant classes without a warning in PHP, so you could resolve that by type checking for both the 2.x and 3.0 class name. (e.g. `if (($foo instanceof modResource) || $foo instanceof \MODX\Revolution\modResource))`

## Changed classes, with upgrade path

The following class names were changed, but have been aliased in 3.0 to help alleviate upgrade pains as they are commonly used. The aliases are automatically in `modX::loadConfig` if `load_deprecated_global_class_aliases` is true, which is the default. It's possible to disable by adding the key with a value of `false` to your `$config_options` in `core/config/config.inc.php`.

**The aliases will no longer be automatically available in MODX 3.3.** If you have not yet updated relevant code by then, you can manually require `core/include/deprecated.php` to temporarily resolve that, but you should still make sure to update the code to the new classes.

This layer of backwards compatibility is likely to be fully removed in MODX 4.0.

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

### MODX Core & Controllers

| New Class                                   | Old Class                   |
| ------------------------------------------- | --------------------------- |
| \MODX\Revolution\modX                       | \modX                       |
| \MODX\Revolution\modParsedManagerController | \modParsedManagerController |
| \MODX\Revolution\modExtraManagerController  | \modExtraManagerController  |

### MODX Model Classes

| New Class                    | Old Class    |
| ---------------------------- | ------------ |
| \MODX\Revolution\modResource | \modResource |

### Processors

All processors have been renamed and moved, including the base processor classes. Flat-file processors are also no longer supported. [See the dedicated processors documentation](getting-started/upgrading-to-3.0/processors)

## Changed classes, without upgrade path

All other model and service classes do not include an automatic alias. This includes utilities like the parser (`\MODX\Revolution\modParser`)

## Removed classes

These classes were permanently removed from 3.0 with no alternative:

-   `modDeprecatedProcessor`
-   `modParser095`
-   `modTranslate095`
-   `modTranslator`
-   All classes and functions related to the `xmlrss` service/utility: `Snoopy`, `MagpieRSS`, `modRSSParser`, `RSSCache`, function `parse_w3cdtf`, function `fetch_rss`. To fetch RSS feeds, you can now use SimplePie.
-   All classes and functions related to the `xmlrpc` and `jsonrpc` services/utilities: `modXMLRPCResponse`, `modJSONRPCResponse`, `modXMLRPCResource` (+ platform classes), `modJSONRPCResource` (+ platform classes)
-   `modManagerControllerDeprecated`

## Signature changes

-   `modResponse::_construct` (and inherited `modManagerResponse`/`modConnectorResponse`) is now marked `public` and no longer includes the ampersand as objects are always passed by reference.
-   `Processor::getInstance` and `modManagerController::getInstance` no longer use the ampersand for passing modX as reference.
