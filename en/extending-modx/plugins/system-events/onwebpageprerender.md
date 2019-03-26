---
title: "OnWebPagePrerender"
_old_id: "482"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onwebpageprerender"
---

## Event: OnWebPagePrerender

 Fired after a Resource is parsed, but before it is rendered.

 Content Type headers have not yet been sent, nor has the output been flushed.

 Service: 5 - Template Service Events 
 Group: None

## Event Parameters

 None.

## Example

 **Description:** Filter words from a document before it's displayed on the web 
**System Events:** OnWebPagePrerender

 ``` php 
$words = array("snippet", "template"); // words to filter
$output = &$modx->resource->_output; // get a reference to the output
$output = str_replace($words,"<b>[filtered]</b>",$output);
```

 Be careful if your OnWebPagePrerender plugin is a static element and it includes or requires files using _relative paths_. The plugin code executes from its cached file, e.g. `core/cache/includes/elements/modplugin/7.include.cache.php`, not from the original static element file. See [Bug 11129](https://github.com/modxcms/revolution/issues/11129)

 

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")