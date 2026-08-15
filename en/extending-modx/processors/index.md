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

## Prefer core processors

When MODX already ships an action you need, call that processor instead of writing raw `newObject()` / `save()` code. You get permissions, validation, alias generation, and plugin events (`OnDocFormSave` and friends) for free. Other extras that listen to those events keep working with your code.

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

In 3.x you can also pass the namespaced class, for example `\MODX\Revolution\Processors\Security\Login`. Slash paths such as `security/login` still resolve. See [Processor loading logic](extending-modx/modx-class/reference/modx.runprocessor#processor-loading-logic).

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

The action has no file extension. MODX looks for `{processors_path}web/orders/getlist.class.php` (and expects a processor class). Same idea as a connector: the connector sets `processors_path`, then routes `action` to a file.

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

- [Using runProcessor](extending-modx/processors/using-runprocessor) — practical Snippet examples
- [modX.runProcessor](extending-modx/modx-class/reference/modx.runprocessor) — parameters and 3.x loading rules
- [Connectors](extending-modx/processors/connectors) — AJAX gateway for CMPs
- [Processors in the 3.0 upgrade guide](getting-started/upgrading-to-3.0/processors)
- [Developing an Extra, Part II](extending-modx/tutorials/developing-an-extra/part-2) — connector + getlist walkthrough
- [Class-based processors](https://www.markhamstra.com/xpdo/2012/getting-started-with-class-based-processors-2.2/) and [modObjectGetListProcessor](https://www.markhamstra.com/xpdo/2012/modobjectgetlistprocessor-class-based-processor/) (Mark Hamstra)
- [Processor list](https://bobsguides.com/modx-processor-list.html) (Bob's Guides, oriented to 2.x paths)
