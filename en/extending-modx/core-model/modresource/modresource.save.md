---
title: "modResource.save"
description: "Persist a Resource and refresh the URIs that depend on it"
---

## modResource.save

Writes the Resource to the database. A new record gets `createdon` and `createdby` from the current time and the logged-in user when they are still empty.

With `friendly_urls` on, the `uri` is recalculated when it is empty or when a field affecting it changed: `alias`, `alias_visible`, `parent`, `context_key`, `content_type`, `isfolder`, `uri_override`. A successful save then refreshes child URIs recursively; a changed `context_key` is propagated to all children. Set `refreshURIs` to `true` before calling the method to force that refresh.

The method fires no events itself. The `save` access policy check happens in `modAccessibleObject::save()`; the manager processors invoke `OnBeforeDocFormSave` and `OnDocFormSave` around their own calls.

## Syntax

``` php
boolean save ([boolean $cacheFlag = null])
```

- `$cacheFlag` _(boolean)_ passed to the parent implementation to control caching of the saved object, by default `null`

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->set('pagetitle', 'foobar');
$resource->save();
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.getAliasPath](extending-modx/core-model/modresource/modresource.getaliaspath)
- [modResource.clearCache](extending-modx/core-model/modresource/modresource.clearcache)
