---
title: "OnLoadWebPageCache"
description: "Fires after a Resource is loaded from the page cache."
_old_id: "430"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onloadwebpagecache"
---

## Event: OnLoadWebPageCache

Fires after a Resource is loaded from the cache. If the Resource is not cached, this event will not fire.

- Service: 4 - Cache Service Events
- Group: System

## Event Parameters

| Name     | Description                                                                               |
| -------- | ----------------------------------------------------------------------------------------- |
| resource | A reference to the modResource instance restored from the cache. **Passed by reference.** |

## Notes

This event is triggered inside the `getResource()` method in [core/src/Revolution/modRequest.php](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modRequest.php).

`_content` holds the rendered Resource (its template): cached placeholders are replaced with values, uncached placeholders stay as markup.

Other Resource properties are overridden the same way:

``` php
// Override Pagetitle
$modx->event->params['resource']->pagetitle = 'My New Pagetitle';
```

TVs are cached as arrays. Read or override element 1:

``` php
// Reading value of TV named "my_tv"
$my_tv = $modx->event->params['resource']->my_tv[1];
/*
// The cached TV array
array (
    0 => 'name_of_tv',      // TV name
    1 => 'Value of TV Goes here', // TV value
    2 => 'default',         // TV display option
    3 => array (),          // TV display_params
    4 => 'text',            // TV type
)
*/
```

To see the stored structure, open the generated cache files in `core/cache/resource/web/resources/`.

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
