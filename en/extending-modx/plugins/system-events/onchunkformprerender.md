---
title: "OnChunkFormPrerender"
_old_id: "408"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onchunkformprerender"
---

## Event: OnChunkFormPrerender

Occurs before the chunk modification form is rendered, but after the JS is registered. Can be used to render custom Javascript for the mgr.

- Service: 1 - Parser Service Events
- Group: Chunks

## Event Parameters

| Name  | Description                                                     |
| ----- | --------------------------------------------------------------- |
| mode  | Either 'new' or 'upd', depending on the circumstance.           |
| id    | The ID of the Chunk. This will be 0 for new chunks.             |
| chunk | A reference to the modChunk object. Will be null in new chunks. |

## Example

Such a plugin loads `style` in` head` and makes the text in `.x-form-text` red:

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
