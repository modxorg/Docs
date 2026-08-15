---
title: 'Processors'
description: "Processors are PHP classes that run one action: create a resource, list records, log a user in"
---

## What a processor is

A processor is a PHP class that runs **one** action against MODX: create a Chunk, list Resources, log a user in, upload a file. The manager UI, connectors, Snippets, and Plugins all reach the same actions through processors.

Since MODX 2.2 processors are class-based (subclasses of the processor base class). Flat `.php` processor files without a class are gone in MODX 3.0.

Core processor classes live under:

- **3.x:** [`core/src/Revolution/Processors/`](https://github.com/modxcms/revolution/tree/3.x/core/src/Revolution/Processors)
- **2.x:** `core/model/modx/processors/` (legacy layout)

Full catalog of core actions (path, docblock summary, `$permission`): [Core processor list](extending-modx/processors/list).

You call them from PHP with [`modX::runProcessor`](extending-modx/modx-class/reference/modx.runprocessor). Manager AJAX goes through a [connector](extending-modx/processors/connectors), which ends up in the same method.

```php
$response = $modx->runProcessor(
    'resource/create',
    $properties,
    $options // optional; often unused for core processors
);
```

`$response` is a [`ProcessorResponse`](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/Processors/ProcessorResponse.php) (3.x) / `modProcessorResponse` (2.x). Check the result before you trust the data:

```php
if ($response->isError()) {
    return $response->getMessage();
}
$object = $response->getObject(); // array of fields from the processor
```

Useful methods: `isError()`, `getMessage()`, `getObject()`, `getResponse()`, `hasFieldErrors()`, `getFieldErrors()`.

### How `run()` works

When MODX runs a processor it does this (see `Processor::run()`):

1. `checkPermissions()`: if it fails, you get a permission error response.
2. Load lexicon topics from `getLanguageTopics()`.
3. `initialize()`: must return `true`, or the return value becomes the failure message.
4. `process()`: the real work. Model helpers (`CreateProcessor`, `GetListProcessor`, …) implement a fixed pipeline with hooks you override.

Inside your class you read input with `getProperty()` / `getProperties()`, write with `setProperty()`, and finish with `$this->success($message, $object)` or `$this->failure($message)`. Field-level errors use `addFieldError('field', $msg)` so MODExt forms can highlight inputs.

### Permissions and context

Many processors declare `public $permission = 'save_document';` (or similar). The logged-in user in the **current** `$modx` context must pass that permission (and whatever else `checkPermissions()` adds). Controllers and connectors usually initialize `mgr`. From a web Snippet you may need `$modx->initialize('mgr')` or a user who already has the right policies in `web`, or the call fails even when the PHP looks fine.

### Action path forms (3.x)

These are equivalent for core processors:

| Form | Example |
| ---- | ------- |
| Slash path (2.x style) | `resource/create` |
| Relative namespace | `Resource\Create` |
| Fully qualified class | `\MODX\Revolution\Processors\Resource\Create` |

Special case: Template Variables live under `Element\TemplateVar\…`. Slash `element/templatevar/create` works. Legacy `element/tv/…` is rewritten to `TemplateVar` in the loader. Details: [Processor loading logic](extending-modx/modx-class/reference/modx.runprocessor#processor-loading-logic).

## Prefer core processors

When MODX already ships an action you need, call that processor instead of writing raw `newObject()` / `save()` code. You get permissions, validation, alias generation, and plugin events (`OnDocFormSave` and friends) for free. Other extras that listen to those events keep working with your code.

Browse what exists: [Core processor list](extending-modx/processors/list) (Browser, Context, Element, Resource, Security, System, Workspace, …).

### Login and logout

```php
$data = [
    'username' => $username,
    'password' => $password,
    'rememberme' => 1,
    'login_context' => 'web',
];
$response = $modx->runProcessor('security/login', $data);
if ($response->isError()) {
    $modx->log(
        modX::LOG_LEVEL_ERROR,
        'Login failed for ' . $username . ': ' . $response->getMessage()
    );
}
```

```php
$response = $modx->runProcessor('security/logout');
if ($response->isError()) {
    $modx->log(modX::LOG_LEVEL_ERROR, $response->getMessage());
}
```

In 3.x you can also pass the namespaced class, for example `\MODX\Revolution\Processors\Security\Login`.

### Create a Resource

```php
$response = $modx->runProcessor('resource/create', [
    'pagetitle' => 'My page',
    'content' => '<p>Hello</p>',
    'parent' => 0,
    'template' => 1,
    'context_key' => 'web',
]);
if ($response->isError()) {
    return $response->getMessage();
}
$id = $response->getObject()['id'];
```

Omit fields you do not care about. The processor fills defaults from System Settings. Set `class_key` when you create a custom Resource type.

Typical create/update processors fire before/after save events (for Resources that includes the same family of events the manager uses). That is why search indexers and other plugins still see your programmatic saves.

### Create a Chunk

```php
$response = $modx->runProcessor('element/chunk/create', [
    'name' => 'HelloBox',
    'description' => 'Created from a Snippet',
    'snippet' => '<div class="hello">[[*pagetitle]]</div>',
]);
if ($response->isError()) {
    return $response->getMessage();
}
```

More Snippet-oriented examples: [Using runProcessor](extending-modx/processors/using-runprocessor).

### List processors and grids

`GetList` processors power ExtJS grids. They expect paging/sort properties such as `start`, `limit`, `sort`, `dir`, and often `query`. The JSON shape includes `success`, `total`, and `results` (exact keys depend on the processor). From PHP:

```php
$response = $modx->runProcessor('resource/getlist', [
    'start' => 0,
    'limit' => 10,
    'sort' => 'pagetitle',
    'dir' => 'ASC',
]);
if ($response->isError()) {
    return $response->getMessage();
}
$data = $response->getResponse();
```

## Custom processors

Extras keep processors under their own tree, usually `core/components/myextra/processors/`. Point `runProcessor` at that tree with `processors_path`:

```php
$response = $modx->runProcessor(
    'web/orders/getlist',
    ['id' => 55],
    [
        'processors_path' => $modx->getOption('core_path')
            . 'components/myextra/processors/',
    ]
);
if ($response->isError()) {
    return $response->getMessage();
}
return $modx->toJSON($response->getResponse());
```

The action has no file extension. MODX looks for `{processors_path}web/orders/getlist.class.php` (and expects a processor class that returns its class name or follows the `modFooBarProcessor` naming guess). Same idea as a connector: the connector sets `processors_path`, then routes `action` to a file.

File naming in extras: `mgr/item/getlist.class.php` paired with action `mgr/item/getlist`. Returning `MyExtra\\Processors\\Item\\GetList::class` from the file avoids ambiguous class guesses.

### Call a core processor from your own

Inside a custom create processor you can run a core one, then continue with your own fields:

```php
$response = $modx->runProcessor('resource/create', $resourceData);
if ($response->isError()) {
    return $this->failure($response->getMessage());
}
$id = $response->getObject()['id'];
// attach extra records to $id …
```

Plugins on Resource save still fire. Alias and other core behaviour stay consistent with the manager.

## Writing a class-based processor

Minimal create processor for a custom xPDO object (3.x class names):

```php
<?php
namespace MyExtra\Processors\Item;

use MODX\Revolution\Processors\Model\CreateProcessor;

class Create extends CreateProcessor
{
    public $classKey = 'MyExtra\\Model\\Item';
    public $objectType = 'myextra.item';
    public $primaryKeyField = 'id';
    public $languageTopics = ['myextra:default'];
    // public $permission = 'myextra_item_save';
    // public $beforeSaveEvent = 'OnBeforeMyExtraItemSave';
    // public $afterSaveEvent = 'OnMyExtraItemSave';

    public function beforeSet()
    {
        $name = trim((string)$this->getProperty('name'));
        if ($name === '') {
            $this->addFieldError('name', $this->modx->lexicon('myextra.item_err_name'));
        }
        return parent::beforeSet();
    }
}

return Create::class;
```

`CreateProcessor::process()` order (simplified): `beforeSet` → `fromArray` → `beforeSave` → validate → before-save event → `saveObject` → `afterSave` → after-save event → `cleanup`.

For lists, extend `GetListProcessor` and filter in `prepareQueryBeforeCount` / `prepareQueryAfterCount`. Read incoming filters with `$this->getProperty('resource_id')` (or whatever you put in the grid `baseParams`). Nothing is injected automatically from the Resource panel unless your JS sends it.

Common model helpers (3.x → see the [3.0 processors upgrade notes](getting-started/upgrading-to-3.0/processors) for the full map):

| Role | 3.x class |
| ---- | --------- |
| Create | `\MODX\Revolution\Processors\Model\CreateProcessor` |
| Update | `\MODX\Revolution\Processors\Model\UpdateProcessor` |
| Get | `\MODX\Revolution\Processors\Model\GetProcessor` |
| Get list | `\MODX\Revolution\Processors\Model\GetListProcessor` |
| Remove | `\MODX\Revolution\Processors\Model\RemoveProcessor` |

In 2.x the same roles use `modObjectCreateProcessor`, `modObjectGetListProcessor`, and so on. Hooks you override most often: `initialize`, `beforeSet`, `beforeSave`, `afterSave`, `prepareQueryBeforeCount` (lists).

## Next steps

- [Core processor list](extending-modx/processors/list): all core actions with short descriptions
- [Using runProcessor](extending-modx/processors/using-runprocessor): practical Snippet examples
- [modX.runProcessor](extending-modx/modx-class/reference/modx.runprocessor): parameters and 3.x loading rules
- [Connectors](extending-modx/processors/connectors): AJAX gateway for CMPs
- [Processors in the 3.0 upgrade guide](getting-started/upgrading-to-3.0/processors)
- [Developing an Extra, Part II](extending-modx/tutorials/developing-an-extra/part-2): connector + getlist walkthrough
- [Class-based processors](https://www.markhamstra.com/xpdo/2012/getting-started-with-class-based-processors-2.2/) and [modObjectGetListProcessor](https://www.markhamstra.com/xpdo/2012/modobjectgetlistprocessor-class-based-processor/) (Mark Hamstra)
- [Processor list on Bob's Guides](https://bobsguides.com/modx-processor-list.html) (oriented to 2.x paths)
