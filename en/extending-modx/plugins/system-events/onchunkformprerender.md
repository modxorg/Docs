---
title: "OnChunkFormPrerender"
description: "Fires before the Chunk form is rendered in the Manager."
---

## Event: OnChunkFormPrerender

Fires before the Chunk form is rendered in the Manager. The controller has loaded its custom CSS/JS (`loadCustomCssJs()`); the page CSS/JS is not registered yet (`registerCssJs()`). Use it to render custom JavaScript in the `mgr` Context.

- Service: 1 - Parser Service Events
- Group: Chunks

## Event Parameters

| Name  | Description                                                      |
| ----- | ---------------------------------------------------------------- |
| mode  | Either `new` or `upd` (`modSystemEvent::MODE_NEW` / `MODE_UPD`). |
| id    | The ID of the Chunk. This will be 0 for new Chunks.              |
| chunk | A reference to the modChunk object. `null` for new Chunks.       |

## Example

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnChunkFormPrerender':
        $modx->regClientStartupHTMLBlock('
        <style>
        .x-form-text {color: #ff0000;}
        </style>');
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
