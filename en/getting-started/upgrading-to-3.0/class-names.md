---
title: Changed Class Names
note: This list may be incomplete, please edit this page to help make it complete. 
---

In order to implement namespaces and make sense of certain code, a lot of files and classes were renamed and moved in 3.0. This leads to potential breaking changes.

You may encounter warnings or errors (including fatal errors) in certain cases:

- when using a direct `include`/`require` statements targeting any relevant file that is no longer there
- when extending one of these classes
- when type hinting against these classes

## Note about Model & Service Classes

Most model and service classes that are loaded through `$modx->loadClass` (which includes the xPDO Query builder for model classes) or `$modx->getService` will still work, as `loadClass` internally translates these to their new class names.

For example `$modx->getIterator('modResource')` will still work - _for now_, even though the `\modResource` class is now `\MODX\Revolution\modResource`.

That will log a deprecated message to your error log encouraging you to update your reference. The right call would be `$modx->getIterator(\MODX\Revolution\modResource::class)`.

It is important to note that if you're **type checking** the result of such a call (e.g. `if ($foo instanceof modResource)`), you may not immediately encounter an error (compared to typehinting, like `public function(modResource $foo)`, which does cause an error), but that **will evaluate to `false`** because the old class name does not exist anymore, so that check always fails.

You can type check against non-existant classes without a warning in PHP, so you could resolve that by type checking for both the 2.x and 3.0 class name. (e.g. `if (($foo instanceof modResource) || $foo instanceof \MODX\Revolution\modResource))`

## Soft Changes

The following class names were changed, but have been aliased in 3.0 to help alleviate upgrade pains as they are commonly used. The aliases are automatically included through the autoloader.

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

### MODX Core & Processors

| New Class                                     | Old Class                     |
| --------------------------------------------- | ----------------------------- |
| \MODX\Revolution\modX                         | \modX                         |
| \MODX\Revolution\modProcessor                 | \modProcessor                 |
| \MODX\Revolution\modObjectProcessor           | \modObjectProcessor           |
| \MODX\Revolution\modObjectCreateProcessor     | \modObjectCreateProcessor     |
| \MODX\Revolution\modObjectExportProcessor     | \modObjectExportProcessor     |
| \MODX\Revolution\modObjectGetListProcessor    | \modObjectGetListProcessor    |
| \MODX\Revolution\modObjectGetProcessor        | \modObjectGetProcessor        |
| \MODX\Revolution\modObjectImportProcessor     | \modObjectImportProcessor     |
| \MODX\Revolution\modObjectRemoveProcessor     | \modObjectRemoveProcessor     |
| \MODX\Revolution\modObjectSoftRemoveProcessor | \modObjectSoftRemoveProcessor |
| \MODX\Revolution\modObjectUpdateProcessor     | \modObjectUpdateProcessor     |
| \MODX\Revolution\modParsedManagerController   | \modParsedManagerController   |
| \MODX\Revolution\modObjectDuplicateProcessor  | \modObjectDuplicateProcessor  |
| \MODX\Revolution\modExtraManagerController    | \modExtraManagerController    |

### MODX Model Classes

| New Class                    | Old Class    |
| ---------------------------- | ------------ |
| \MODX\Revolution\modResource | \modResource |

## Hard Changes

The class name changes in this section **do not** have a separate compatibility layer, are immediately unavailable in 3.0. These are (relatively) unused in extended classes but may be used for typehinting.

... all processors ...
