---
title: "modX.filterPathSegment"
description: "Turns a string into a URL path segment with the Resource alias pipeline"
---

## modX::filterPathSegment

Delegates to the static `modResource::filterPathSegment()` — the pipeline that converts a pagetitle into a Resource alias. In order, it:

1. strips tags and decodes entities;
2. transliterates and restricts the character set;
3. applies word delimiters, lowercases and trims;
4. cuts the segment to `friendly_alias_max_length` when the setting is above zero.

The same method runs as the [`filterPathSegment`](building-sites/tag-syntax/output-filters) output filter, and media sources pass upload names through it.

## Syntax

``` php
string filterPathSegment (string $string, [array $options = []])
```

- `$string` _(string)_ text to convert
- `$options` _(array)_ `friendly_alias_*` overrides for this call, by default `[]`

## Example

``` php
$segment = $modx->filterPathSegment('My News Title');
// 'my-news-title'

$segment = $modx->filterPathSegment('My News Title', array(
    'friendly_alias_lowercase_only' => false,
));
// 'My-News-Title'
```

## See Also

- [modX](extending-modx/core-model/modx)
- [modResource](extending-modx/core-model/modresource)
- [Transliteration](getting-started/friendly-urls/transliteration)
- [Output filters](building-sites/tag-syntax/output-filters)
