---
title: "modChunk.setContent"
_old_id: "1338"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modchunk/modchunk.setcontent"
description: "Set the content of this Chunk"
---

## modChunk::setContent

Sets the content of this Chunk.

## Syntax

``` php
boolean setContent ($content [, array $options = array()])
```

Returns `true` if the content was set. Inherited from `modElement` (`core/src/Revolution/modElement.php`).

## Example

``` php
$chunk->setContent('<h2>Hello!</h2>');
```

## See Also

- [modChunk](extending-modx/core-model/modchunk)
- [modChunk.getContent](extending-modx/core-model/modchunk/modchunk.getcontent)
