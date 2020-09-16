---
title: "OnChunkFormRender"
_old_id: "409"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onchunkformrender"
---

## Event: OnChunkFormRender

Fires during the rendering of a form. Useful for rendering HTML straight into the Chunk form.

- Service: 1 - Parser Service Events
- Group: Chunks

## Event Parameters

| Name  | Description                                                     |
| ----- | --------------------------------------------------------------- |
| mode  | Either 'new' or 'upd', depending on the circumstance.           |
| id    | The ID of the Chunk. This will be 0 for new chunks.             |
| chunk | A reference to the modChunk object. Will be null in new chunks. |

## Examples of

Such a plugin will add content to the chunk and save it:

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
                
Such a plugin will add content to the chunk if it has no content and will save it:

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
                
Such a plugin will add content to the chunk but will not save it:

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
