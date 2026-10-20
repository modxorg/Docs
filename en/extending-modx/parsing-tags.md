---
title: Parsing MODX Tags
description: Process MODX tags outside the normal parsing flow with modParser::processElementTags, including uncacheable tags and raw element content.
---

Use this when you need [snippet, chunk, or lexicon tags](building-sites/tag-syntax) parsed outside the normal page render: generating email bodies, or returning fully processed content from an API.

[modX::getChunk](extending-modx/modx-class/reference/modx.getchunk) already runs the parser over a chunk. What it leaves behind are uncacheable tags — `[[!Wayfinder]]`, `[[!getResources?…]]` — because `modChunk::process()` passes the parser's `isProcessingUncacheable()` flag, and that flag is `false` outside a render.

`modParser::processElementTags()` is the way to finish the job.

## From a chunk

`getChunk()` has already processed the cacheable tags, so one pass is enough:

``` php
$content = $modx->getChunk('MyChunkName', ['foo' => 'bar']);

$parser = $modx->getParser();
$maxIterations = (integer) $modx->getOption('parser_max_iterations', null, 10);

// Process uncached tags, stripping anything that could not be processed
$parser->processElementTags('', $content, true, true, '[[', ']]', [], $maxIterations);

return $content;
```

## From raw content

[modElement::getContent()](extending-modx/core-model/modchunk/modchunk.getcontent) returns the source as stored, with every tag intact. Parse it in two passes: the first handles cacheable tags, the second uncacheable ones.

``` php
$chunk = $modx->getObject('modChunk', 'MyChunkName');
$content = $chunk->getContent();

$parser = $modx->getParser();
$maxIterations = (integer) $modx->getOption('parser_max_iterations', null, 10);

$parser->processElementTags('', $content, false, false, '[[', ']]', [], $maxIterations);
$parser->processElementTags('', $content, true, true, '[[', ']]', [], $maxIterations);

return $content;
```

> [!WARNING]
> Each call to `processElementTags()` fires the `OnParseDocument` plugin event. The two-pass recipe above therefore triggers it twice — plugins on that event run their logic twice and can rewrite the content through the passed reference.

## Method reference

``` php
$processed = $parser->processElementTags(
    $parentTag,
    &$content,
    $processUncacheable = false,
    $removeUnprocessed = false,
    $prefix = '[[',
    $suffix = ']]',
    $tokens = [],
    $depth = 0
);
```

| Parameter | Role |
| --- | --- |
| `$parentTag` | Tag of the element being processed. A tag matching it is blanked out so the parser cannot consume its own delimiter; pass `''` to skip that check |
| `$content` | String being parsed. Passed **by reference** — the result is written back into the variable, not returned |
| `$processUncacheable` | Process `[[!…]]` tags on this pass |
| `$removeUnprocessed` | Strip tags that produced no output instead of leaving them in place |
| `$prefix` / `$suffix` | Delimiters, `[[` and `]]` by default |
| `$tokens` | Restrict parsing to these leading tokens (`+`, `%`, `~`, `$`, `*`, `-`). Empty means "all" |
| `$depth` | Number of extra passes over the output |

The return value is the number of tags processed.

## Parser depth

`$depth` counts additional passes, not nesting levels. The counter drops by one on entry and another pass runs only while it is above zero, so `10` yields at most ten passes over the content.

The value comes from `parser_max_iterations`, which is **not** a system setting — it does not appear in the manager. `modX::getOption()` falls back to `$modx->config`, so set it in `core/config/config.inc.php`:

``` php
$config_options = ['parser_max_iterations' => 20];
```

The default is `10`.

## Why two passes

[parser_recurse_uncacheable](building-sites/settings/parser_recurse_uncacheable) (a real system setting, enabled by default) stops the parser from writing uncacheable output into cacheable content. With it disabled, uncacheable element output can end up cached inside the surrounding cacheable content — which is why the uncacheable pass comes last.

## See also

- [modX::getChunk](extending-modx/modx-class/reference/modx.getchunk)
- [modChunk::getContent()](extending-modx/core-model/modchunk/modchunk.getcontent)
- [modChunk::process()](extending-modx/core-model/modchunk/modchunk.process)
- [Tag syntax](building-sites/tag-syntax)