---
title: "Getting Started Part 3: Processors"
_old_id: "1118"
_old_uri: "2.x/case-studies-and-tutorials/php-coding-in-modx-revolution,-pt.-i/php-coding-in-modx-revolution,-pt.-iii"
description: "How MODX processors work, walked through on the Chunk create processor"
---

Form processing runs in **Processors** — PHP classes in the core that load, validate and save data. The UI calls them through **Connectors**: a request carries an `action` parameter naming the processor, which works with sanitized request data and answers with JSON. Several such requests can run at once, asynchronous to the page.

Processors fill the role of the write side in an MVC model: the model layer here is mostly ORM classes, so the business logic of a form lives in the processor.

## How a request reaches the processor

Since 2.3 there are no per-element connector files. All connector requests go to a single front controller:

> /connectors/index.php

In JS, the connector URL is `MODX.config.connector_url` (which is `connectors/index.php`). The Chunk-create request looks like:

``` javascript
MODx.Ajax.request({
    url: MODx.config.connector_url
    ,params: {
        action: 'element/chunk/create'
        ,name: 'MyChunk'
        ,snippet: '[[+php]]'
    }
    ,listeners: {
        success: {fn:function(r) { /* ... */ },scope:this}
    }
});
```

The `action` string `element/chunk/create` maps to the class:

> core/src/Revolution/Processors/Element/Chunk/Create.php
> (`MODX\Revolution\Processors\Element\Chunk\Create`)

The same class is what `$modx->runProcessor('element/chunk/create', $props)` calls on the PHP side — runProcessor builds the class name from the action (`Processors\` + ucfirst of each `/` segment). The processor responds with JSON `{success, message, total, object}`.

## Inside the Chunk Create processor

The class itself is small — most of the work lives in its parents:

``` php
<?php
namespace MODX\Revolution\Processors\Element\Chunk;

use MODX\Revolution\modChunk;

class Create extends \MODX\Revolution\Processors\Element\Create
{
    public $classKey = modChunk::class;
    public $languageTopics = ['chunk', 'category', 'element'];
    public $permission = 'new_chunk';
    public $objectType = 'chunk';
    public $beforeSaveEvent = 'OnBeforeChunkFormSave';
    public $afterSaveEvent = 'OnChunkFormSave';
}
```

Each property drives one concern of the generic create workflow:

| Property | What it does |
| --- | --- |
| `$classKey` | Which model class is created (`$modx->newObject($classKey)`) |
| `$languageTopics` | Lexicon topics loaded before the processor runs (i18n strings are split by topic; do not confuse these with gettext contexts) |
| `$permission` | Permission key checked up front; missing right → failure response with `permission_denied` |
| `$beforeSaveEvent` / `$afterSaveEvent` | System events invoked around `$object->save()` (`OnBeforeChunkFormSave`, `OnChunkFormSave`), with `mode` and `id` in the params |

The base classes (`Processors\Model\CreateProcessor` → `Processors\Model\Processor`) then run the standard sequence: check permission → load lexicons → `newObject($classKey, $properties)` → run validation → `beforeSave()` → `save()` → invoke after-save event → `logManagerAction()` → `clearCache()` → `success($message, $object)`.

Older tutorials walked these steps by hand — lexicon load, permission check, category lookup, `newObject`, events, log, cache, `$modx->error->success()`. In current MODX they run inside the base classes.

`$modx->error->success()` and `$modx->error->failure()` still exist (`MODX\Revolution\Error\modError`) if you write a processor by hand; both take:

1. `$message` — a string returned to the client, success or failure alike.
2. `$object` — an `xPDOObject` or an array of fields, converted to JSON.

Customizing a create processor usually means overriding `beforeSave()` (extra checks, fixing properties) and `cleanup()` (extra fields in the response) — as the Chunk class does for static chunks:

``` php
public function beforeSave()
{
    $isStatic = intval($this->getProperty('static', 0));
    if ($isStatic == 1) {
        $staticFile = $this->getProperty('static_file');
        if (empty($staticFile)) {
            $this->addFieldError('static_file', $this->modx->lexicon('static_file_ns'));
        }
    }
    return parent::beforeSave();
}
```
