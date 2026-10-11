---
title: "modChunk.save"
description: "Save the Chunk to the database, firing OnChunkBeforeSave and OnChunkSave"
---

## modChunk::save

Writes the Chunk record to the database. The call goes through `modElement::save`, which also synchronizes the external file of a static Chunk.

Both events fire only when the instance is a `modX`: `OnChunkBeforeSave` before the write, `OnChunkSave` after it succeeded. Each event receives the `mode` (`new` or `upd`), a reference to the `chunk`, and the `cacheFlag`.

A listener can modify the Chunk because the write happens after the event. Listener return values are ignored, so the save cannot be aborted from an event. A failed write is logged as `chunk_err_create` for a new Chunk or as `chunk_err_save` for an existing one.

## Syntax

``` php
boolean save ([boolean|integer $cacheFlag = null])
```

- `$cacheFlag` _(boolean|integer)_ Whether the record is cached; an integer is the lifetime in seconds, by default `null`. Both events receive it as a parameter.
- Declared in `modChunk` (`core/src/Revolution/modChunk.php`), wraps `modElement::save` (`core/src/Revolution/modElement.php`).

## Example

``` php
$chunk = $modx->newObject('modChunk');
$chunk->fromArray([
    'name' => 'MyChunk',
    'content' => '<p>Hello!</p>',
]);
$chunk->save();
```

## See Also

- [modChunk](extending-modx/core-model/modchunk)
- [modChunk.getContent](extending-modx/core-model/modchunk/modchunk.getcontent)
- [OnChunkBeforeSave](extending-modx/plugins/system-events/onchunkbeforesave)
- [OnChunkSave](extending-modx/plugins/system-events/onchunksave)
