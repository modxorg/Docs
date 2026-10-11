---
title: "modResource.isDuplicateAlias"
description: "Check whether an alias path is already taken"
---

## modResource.isDuplicateAlias

Looks for another non-deleted Resource with the same `uri`. With `$aliasPath` empty the path is built from the Resource's own alias. The Resource itself is excluded by ID, so it never collides with itself.

Returns the ID of the conflicting Resource as an integer, or `false` when the path is free. Pass `$contextKey` to limit the search to one context.

## Syntax

``` php
mixed isDuplicateAlias ([string $aliasPath = '' [, string $contextKey = '']])
```

- `$aliasPath` _(string)_ full alias path to test, by default `''`
- `$contextKey` _(string)_ context to search in, by default `''` searches every context

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$duplicateId = $resource->isDuplicateAlias('parent/about-us', 'web');
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.getAliasPath](extending-modx/core-model/modresource/modresource.getaliaspath)
