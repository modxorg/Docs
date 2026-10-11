---
title: "modResource.getPreviewUrl"
description: "Build the manager preview URL of a Resource"
---

## modResource.getPreviewUrl

Returns the URL behind the manager's Preview button. For a plain document the method calls `modX::makeUrl()` for this Resource. Symlinks must hold an integer target. Weblinks may hold an ID, a `[[~id]]` tag, a link tag with options, or an external URL. The ID variants are validated with `canPreviewResource()`.

An empty string comes back for a deleted Resource, an empty or invalid link, or a target failing the check; null is never returned. When the context has sessions disabled, the URL gets a `preview=true` query parameter. The call has a side effect: the `cache_alias_map` option is switched off for the rest of the request.

## Syntax

``` php
string getPreviewUrl ()
```

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$url = $resource->getPreviewUrl();
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.canPreviewResource](extending-modx/core-model/modresource/modresource.canpreviewresource)
- [modResource.parseContent](extending-modx/core-model/modresource/modresource.parsecontent)
