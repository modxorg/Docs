---
title: "modChunk.remove"
description: "Delete the Chunk, firing OnChunkBeforeRemove and OnChunkRemove"
---

## modChunk::remove

Deletes the Chunk row with its composite records: property set links and element ACL entries. The static source file of a static Chunk stays on disk.

Both events fire only when the instance is a `modX`: `OnChunkBeforeRemove` before the deletion, `OnChunkRemove` after it succeeded. Each event receives a reference to the `chunk` and the `ancestors` array. The parent implementation checks the `remove` access policy first, and a failed deletion is logged with `chunk_err_remove`.

## Syntax

``` php
boolean remove ([array $ancestors = []])
```

- `$ancestors` _(array)_ Keeps track of records already deleted so circular composite references do not loop, by default `[]`.
- Declared in `modChunk` (`core/src/Revolution/modChunk.php`); the parent implementation is `modAccessibleObject::remove` (`core/src/Revolution/modAccessibleObject.php`).

## Example

``` php
$chunk = $modx->getObject('modChunk', ['name' => 'MyChunk']);
if ($chunk) {
    $chunk->remove();
}
```

## See Also

- [modChunk](extending-modx/core-model/modchunk)
- [OnChunkBeforeRemove](extending-modx/plugins/system-events/onchunkbeforeremove)
- [OnChunkRemove](extending-modx/plugins/system-events/onchunkremove)
