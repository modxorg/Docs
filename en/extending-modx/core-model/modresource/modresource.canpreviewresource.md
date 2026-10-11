---
title: "modResource.canPreviewResource"
description: "Check that a preview target exists and is not deleted"
---

## modResource.canPreviewResource

Validates a preview target before the manager builds a preview URL. A `$targetId` whose string form starts with `0` — `0` itself and strings like `05` — is rejected first; then the target is loaded and must not be deleted. Every failure path writes a `resource_err_preview_*` lexicon message to the error log; `$sourceId` only selects which message a failure logs. Self-previews — `$sourceId` equal to `$targetId` or not passed at all — get their own entries.

The method is declared with a `bool` return type and always returns a boolean. Only `getPreviewUrl()` calls it in core.

## Syntax

``` php
boolean canPreviewResource (int|string $targetId [, int|string|null $sourceId = null])
```

- `$targetId` _(int|string)_ ID of the Resource to be previewed
- `$sourceId` _(int|string|null)_ ID of the Resource the preview was requested from, by default `null`

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
if ($resource->canPreviewResource(5)) {
    $url = $resource->getPreviewUrl();
}
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.getPreviewUrl](extending-modx/core-model/modresource/modresource.getpreviewurl)
