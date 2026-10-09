---
title: Processors
---

In MODX 3.0 all processors have been **renamed** and **moved** compared to 2.x. This also includes the base processors (`modObject...Processor`).

For third-party extras, this means:

- If you extend any core processor in custom code, that needs your attention.
- If you call core processors with runProcessor, those still work, but may have slightly different behavior.
- If you use flat-file processors, you will need to rewrite the processor into a class.

## Base processors

Any processor that previously inherited from a base processor (`modProcessor`, `modObjectProcessor`, `modDriverSpecificProcessor`, any `modObject*Processor`) must be updated. Practically, that means every processor.

The old class names are available as aliases for now, but **automatic loading of those aliases will stop in a future 3.x release (the source comment in `core/include/deprecated.php` says "likely 3.3 or 3.4")**.

- To support both 2.x and 3.x, you can keep using the `modObject...Processor` classes for now, but plan for MODX 3.3+. Tell your users which versions you support and until when.
- To support 3.0+ without another round of changes when the aliases stop loading, change the class name you extend.

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
| `\modObjectImportProcessor`     | `\MODX\Revolution\Processors\Model\ImportProcessor`     |
| `\modObjectRemoveProcessor`     | `\MODX\Revolution\Processors\Model\RemoveProcessor`     |
| `\modObjectSoftRemoveProcessor` | `\MODX\Revolution\Processors\Model\SoftRemoveProcessor` |
| `\modObjectUpdateProcessor`     | `\MODX\Revolution\Processors\Model\UpdateProcessor`     |
| `\modProcessorResponse`         | `\MODX\Revolution\Processors\ProcessorResponse`         |
| `\modProcessorResponseError`    | `\MODX\Revolution\Processors\ProcessorResponseError`    |

## Calling core processors with runProcessor

Review every call to a core processor. The old action names in [modX::runProcessor](extending-modx/modx-class/reference/modx.runprocessor) (e.g. `resource/create`) are still supported, but the internal logic of some processors has changed. `runProcessor` also accepts a full processor class name as `$action`, e.g. `$modx->runProcessor(\MODX\Revolution\Processors\Resource\Create::class, $props)`.

## Custom resource types (CRC)

If a custom resource class defines `{ClassKey}CreateProcessor` or `{ClassKey}UpdateProcessor`, the core resource processors instantiate that class instead of themselves. Custom resource types that extend those processors must follow the 3.x class names.

In 2.x the core classes lived at `core/model/modx/processors/resource/create.class.php` (`modResourceCreateProcessor`) and `update.class.php` (`modResourceUpdateProcessor`). Those files are gone.

| Old class                       | New class                                       |
| ------------------------------- | ----------------------------------------------- |
| `\modResourceCreateProcessor`   | `\MODX\Revolution\Processors\Resource\Create`   |
| `\modResourceUpdateProcessor`   | `\MODX\Revolution\Processors\Resource\Update`   |

`core/include/deprecated.php` aliases the old names for now (automatic loading stops in a future 3.x release — "likely 3.3 or 3.4"). A `require_once` of the 2.x paths fails.

See [Custom Resource Classes](building-sites/resources/custom-resources) and [Step 4: Customizing the Processors](extending-modx/custom-resources/step-4-processors).

## Flat-file processors no longer supported

Flat-file processors — files ending in `.php` instead of `.class.php` that do not use a processor class — are no longer supported. Refactor them into object-based processors using the classes above.

