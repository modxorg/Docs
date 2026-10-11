---
title: "modResource.duplicate"
description: "Duplicate a Resource with its TVs and groups"
---

## modResource.duplicate

Creates a copy of the Resource with a fresh ID. The `pagetitle` is kept unless `newName` or `prefixDuplicate` is given, and publication fields follow `publishedMode`. Template Variable values and Resource Group memberships are copied too.

Returns the new `modResource`, the `resource_err_duplicate` lexicon string when the copy cannot be saved, or `false` outside `modX`. Children are duplicated recursively unless `duplicateChildren` is disabled; recursion stops when the user lacks the `add_children` policy.

## Syntax

``` php
mixed duplicate ([array $options = array()])
```

- `newName` _(string)_ pagetitle for the copy
- `prefixDuplicate` _(boolean)_ prefix the pagetitle with the `duplicate_of` lexicon entry
- `publishedMode` _(string)_ `preserve` (default), `publish` or `unpublish`
- `overrides` _(array)_ field values merged into the copy
- `parent` _(int)_ parent of the copy, by default the same parent
- `preserve_alias` _(boolean)_ keep the original alias instead of rebuilding it, by default `false`
- `preserve_menuindex` _(boolean)_ keep the original menuindex instead of appending, by default `false`
- `global_duplicate_uri_check` _(boolean)_ check alias uniqueness across all contexts, by default `false`
- `duplicateChildren` _(boolean)_ duplicate descendants as well, by default `true`

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$copy = $resource->duplicate(array(
    'newName' => 'foobar copy',
    'publishedMode' => 'unpublish',
));
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.getAliasPath](extending-modx/core-model/modresource/modresource.getaliaspath)
