---
title: "OnLoadWebDocument"
_old_id: "429"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onloadwebdocument"
---

## Event: OnLoadWebDocument 

Fires directly before the Response is sent and after a Resource is loaded.

Service: 5 - Template Service Events 
Group: None

## Event Parameters 

None. The resource can be referenced via $modx->resource.

## Return Values 

Any values returned from this event will be written as errors to the logs.

## Usage 

_\* Some of this may not be accurate because I'm testing this via trial and error._

You can use this event to set resource parameters at runtime or perform logging. E.g.

``` php 
// Set all pages to be uncached (for debugging)
$modx->resource->set('cacheable', 0);
// Or switch the template
$modx->resource->set('template', 6);
// Alternate syntax
$modx->resource->template = 6;
```

Note that modifying resource parameters during the _first_ page load (before the resource is cached) will cause those parameters to be written to the cache file. E.g. changing the template at this point will cause the resource `_content` to store the contents of the newly referenced template.

After a page has been cached (i.e. _not_ the first page load), you can append or prepend content (or overwrite it entirely) by modifying the \_content property.

``` php 
$modx->resource->_content = 'Content override';
```

## See Also 

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")