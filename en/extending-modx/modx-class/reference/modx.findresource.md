---
title: "modX.findResource"
description: "Resolves a URI to a Resource id in a context"
---

## modX::findResource

Resolves a Resource URI, or its alias, to the numeric id of the non-deleted Resource in the given context. Returns `false` when nothing matches. The lookup does not check the `published` field.

The URI is looked up in the cached alias map when `cache_alias_map` is on, and in the database otherwise.

## Syntax

``` php
integer|false findResource (string $uri, [string $context = ''])
```

- `$uri` _(string)_ The URI to look up. An empty value is rejected; the string `'0'` is accepted explicitly.
- `$context` _(string)_ The context key to search in. Defaults to the current context.

## Example

``` php
$id = $modx->findResource('about-us', 'web');
if ($id !== false) {
    echo $id;
}
```

## See Also

- [modX](extending-modx/core-model/modx)
- [modX.makeUrl](extending-modx/modx-class/reference/modx.makeurl)
