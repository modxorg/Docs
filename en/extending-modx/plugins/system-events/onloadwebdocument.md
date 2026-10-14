---
title: "OnLoadWebDocument"
description: "Fires after a Resource is loaded, right before the response is sent to the browser."
_old_id: "429"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onloadwebdocument"
---

## Event: OnLoadWebDocument

Fires directly before the Response is sent and after a Resource is loaded.

- Service: 5 - Template Service Events
- Group: System

## Event Parameters

None. The resource can be referenced via `$modx->resource`.

## Return Values

Values returned from this event are written to the log as errors.

## Usage

Set Resource properties at runtime or log data:

``` php
// Set all pages to be uncached (for debugging)
$modx->resource->set('cacheable', 0);
// Or switch the template
$modx->resource->set('template', 6);
// Alternate syntax
$modx->resource->template = 6;
```

Changing properties on the **first** page load writes them to the cache file. Changing the template there makes the cached resource `_content` hold the output of the new template.

After the page has been cached (any later load), append, prepend or replace output by modifying the `_content` property:

``` php
$modx->resource->_content = 'Content override';
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
