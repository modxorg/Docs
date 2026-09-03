---
title: Processors
---

In MODX 3.0 all processors have been **renamed** and **moved** compared to 2.x. This also includes the base processors (`modObject...Processor`).

For third party extras, this means:

-   If you extend any core processor in custom code, that will need your attention.
-   If you call any core processors with runProcessor, those should still work, but may have slightly different behavior.
-   If you use flat-file processors, you will need to rewrite the processor into a class.

## Base processors

Any processor that previously inherited from a base processor (such as `modProcessor`, `modObjectProcessor`, `modDriverSpecificProcessor`, and any `modObject*Processor`) will need to be updated. Practically, that means every single processor.

To help ease with the transition to 3.0, the old class names are automatically made available as aliases, but **those aliases will be removed in MODX 3.3**.

-   If you want to support both 2.x and 3.x, you can continue to use the `modObject...Processor` classes for now, but you should make a plan for MODX 3.3+. Communicate clearly to your users which versions you intend to support and until when.
-   To upgrade your codebase to support 3.0+ (and not require additional upgrades when 3.3 comes), you'll need to change the class name you're extending.

| Old Class                       | New Class                                               |
| ------------------------------- | ------------------------------------------------------- |
| `\modProcessor`                 | `\MODX\Revolution\Processors\Processor`                 |
| `\modObjectProcessor`           | `\MODX\Revolution\Processors\ModelProcessor`            |
| `\modDriverSpecificProcessor`   | `\MODX\Revolution\Processors\DriverSpecificProcessor`   |
| `\modObjectCreateProcessor`     | `\MODX\Revolution\Processors\Model\CreateProcessor`     |
| `\modObjectDuplicateProcessor`  | `\MODX\Revolution\Processors\Model\DuplicateProcessor`  |
| `\modObjectExportProcessor`     | `\MODX\Revolution\Processors\Model\ExportProcessor`     |
| `\modObjectGetListProcessor`    | `\MODX\Revolution\Processors\Model\GetListProcessor`    |
| `\modObjectGetProcessor`        | `\MODX\Revolution\Processors\Model\GetProcessor`        |
| `\modObjectRemoveProcessor`     | `\MODX\Revolution\Processors\Model\RemoveProcessor`     |
| `\modObjectSoftRemoveProcessor` | `\MODX\Revolution\Processors\Model\SoftRemoveProcessor` |
| `\modObjectUpdateProcessor`     | `\MODX\Revolution\Processors\Model\UpdateProcessor`     |

## Calling core processors with runProcessor

Any call to a core processor will need to be reviewed. The old action names in [modX::runProcessor](extending-modx/modx-class/reference/modx.runprocessor) (e.g. `resource/create`) are still supported, but it is possible that the internal logic of some processors has changed.

## Custom resource types (CRC)

If a custom resource class defines `{ClassKey}CreateProcessor` or `{ClassKey}UpdateProcessor`, the core resource processors instantiate that class instead of themselves. Custom resource types that extend those processors must follow the 3.x class names.

In 2.x the core classes lived at `core/model/modx/processors/resource/create.class.php` (`modResourceCreateProcessor`) and `update.class.php` (`modResourceUpdateProcessor`). Those files are gone.

| Old class                       | New class                                       |
| ------------------------------- | ----------------------------------------------- |
| `\modResourceCreateProcessor`   | `\MODX\Revolution\Processors\Resource\Create`   |
| `\modResourceUpdateProcessor`   | `\MODX\Revolution\Processors\Resource\Update`   |

`core/include/deprecated.php` aliases the old names until 3.3. A `require_once` of the 2.x paths fails.

See [Step 4: Customizing the Processors](extending-modx/custom-resources/step-4-processors).

## Flat-file processors no longer supported

Support for so-called flat-file processors (which end in `.php` rather than `.class.php` and don't use a processor class) has been removed.

Any flat-file processor will need to be refactored into an object-based processor using the classes mentioned above.
