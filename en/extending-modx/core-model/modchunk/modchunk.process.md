---
title: "modChunk.process"
description: "Render the Chunk with the given properties and return the output"
---

## modChunk::process

Renders the Chunk and returns the output.

1. `modElement::process` merges the given properties over the stored defaults and property sets, applies the input filter and loads the content.
2. The parser walks the body for `[[...]]` tags; every property is available as a `[[+key]]` placeholder. The walk repeats up to `parser_max_iterations` times, 10 by default. That value is not a system setting — see [Parsing MODX Tags](extending-modx/parsing-tags).
3. The output filter runs.
4. A cacheable Chunk's result enters the per-request element cache; a later call with the same tag reuses it.

## Syntax

``` php
string process ([array|string $properties = null, string $content = null])
```

- `$properties` _(array|string)_ Merged over the Chunk's own properties and property sets before rendering, by default `null`.
- `$content` _(string)_ Replaces the stored Chunk content for this run; non-string values are ignored, by default `null`.
- Declared in `modChunk` (`core/src/Revolution/modChunk.php`), overrides `modElement::process` (`core/src/Revolution/modElement.php`).

## Example

``` php
$chunk = $modx->getObject('modChunk', ['name' => 'MyChunk']);
$chunk->setContent('<p>Hello, [[+name]]!</p>');
echo $chunk->process([
    'name' => 'staff',
]);
```

## See Also

- [modChunk](extending-modx/core-model/modchunk)
- [modChunk.getContent](extending-modx/core-model/modchunk/modchunk.getcontent)
- [modChunk.setContent](extending-modx/core-model/modchunk/modchunk.setcontent)
- [Parsing MODX Tags](extending-modx/parsing-tags)
