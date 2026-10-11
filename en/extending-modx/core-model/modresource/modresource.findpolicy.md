---
title: "modResource.findPolicy"
description: "Load the resource group access policies of a Resource"
---

## modResource.findPolicy

Collects the `modAccessResourceGroup` ACL rows that apply to this Resource in the given context, joined with its Resource Groups. The result is cached in `_policies` per context, so repeated calls in one request do not query the database again.

Returns an empty array when `access_resource_group_enabled` is off for the context, or when no ACL matches. `modAccessibleObject::checkPolicy()` is built on this method.

## Syntax

``` php
array findPolicy ([string $context = ''])
```

- `$context` _(string)_ context key to load policies for, by default `''` selects the current context

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$policies = $resource->findPolicy('web');
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.save](extending-modx/core-model/modresource/modresource.save)
