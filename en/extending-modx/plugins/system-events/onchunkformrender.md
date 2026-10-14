---
title: "OnChunkFormRender"
description: "Fires during the rendering of the Chunk form."
_old_id: "409"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onchunkformrender"
---

## Event: OnChunkFormRender

Fires during the rendering of the Chunk form. Use it to insert HTML straight into the form.

- Service: 1 - Parser Service Events
- Group: Chunks

## Event Parameters

| Name  | Description                                                      |
| ----- | ---------------------------------------------------------------- |
| mode  | Either `new` or `upd` (`modSystemEvent::MODE_NEW` / `MODE_UPD`). |
| id    | The ID of the Chunk. This will be 0 for new Chunks.              |
| chunk | A reference to the modChunk object. `null` for new Chunks.       |

## Examples

### Set content and save it

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnChunkFormRender':
        //if we update the existing
        if ($mode == modSystemEvent::MODE_UPD) {
            //added chunk content
            $chunk->setContent('<p>Chunk content</p>');
            //you can immediately save new content
            $chunk->save();
        }
        break;
}
```

### Set content only when it is empty

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnChunkFormRender':
        //if we update the existing
        if ($mode == modSystemEvent::MODE_UPD) {
            //we take the content of the chunk
            $content = $chunk->getContent();
            // if there is no content, push in a new one
            if (!$content){
                $chunk->setContent('<p>New content</p>');
                //you can immediately save new content
                $chunk->save();
            }
        }
        break;
}
```

### Change content without saving

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnChunkFormRender':
        //if we update the existing
        if ($mode == modSystemEvent::MODE_UPD) {
            //change the entire contents of the chunk
            $chunk->setContent('<p>New content</p>');
            $chunk->set('name','NewChunkName');
            $chunk->set('description','Description');
            //you can immediately save new content $chunk->save();
        }
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
