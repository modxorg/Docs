---
title: "OnWebPagePrerender"
description: "Fires after a Resource is parsed, but before it is rendered."
_old_id: "482"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onwebpageprerender"
---

## Event: OnWebPagePrerender

Fires after a Resource is parsed, before it is rendered. Content-Type headers are not sent yet and the output is not flushed.

- Service: 5 - Template Service Events
- Group: System

## Event Parameters

None.

## Example

Filter words from the output before it is displayed:

```php
$words = array("snippet", "template"); // words to filter
$output = &$modx->resource->_output; // get a reference to the output
$output = str_replace($words,"<b>[filtered]</b>",$output);
```

**Static Plugins and relative paths.** If the Plugin is a static element and includes or requires files by _relative paths_, it does not run from the original file. Its code executes from the cached copy — for example `core/cache/includes/elements/modplugin/7.include.cache.php`. See [Bug 11129](https://github.com/modxcms/revolution/issues/11129).

## See Also

-   [System Events](extending-modx/plugins/system-events "System Events")
-   [Plugins](extending-modx/plugins "Plugins")
