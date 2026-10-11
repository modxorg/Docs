---
title: "modChunk.getContent"
description: "Get the source content of this chunk"
---

## modChunk::getContent

Get the source content of this Chunk. The content keeps raw tags; see [Parsing MODX Tags](extending-modx/parsing-tags) to process them.

## Syntax

``` php
string getContent ([array $options = array()])
```

Inherited from `modElement` (`core/src/Revolution/modElement.php`), not declared on modChunk. For a static Chunk, the method reads the source file and writes it back with `save()` if it differs from the stored content.

## Example

``` php
$chunk = $modx->getObject('modChunk',array('name' => 'MyChunk'));
if ($chunk) {
  $content = $chunk->getContent();
}
```

## See Also

- [modChunk](extending-modx/core-model/modchunk)
- [modChunk.setContent](extending-modx/core-model/modchunk/modchunk.setcontent)
- [Parsing MODX Tags](extending-modx/parsing-tags)
