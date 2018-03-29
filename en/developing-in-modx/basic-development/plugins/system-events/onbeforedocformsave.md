---
title: "OnBeforeDocFormSave"
_old_id: "381"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforedocformsave"
---

## Event: OnBeforeDocFormSave

Fires before a Resource is saved in the manager via the editing form. This allows code to prevent the saving of a document.

Service: 1 - Parser Service Events 
 Group: Documents

**Be Careful with TVs** 
 Changing or inserting TV values is better done [OnDocFormSave](developing-in-modx/basic-development/plugins/system-events/ondocformsave "OnDocFormSave") as the process for saving TVs during onBeforeDocFormSave is more complicated due to TV values being rendered.

Plugins tied to this event should return **null** on success. Any value returned will be sent to the logs as an error (but the page will still be saved).

You may also pass a message to the $modx->event->output() function and this will be displayed to the user in a modal pop-up window. If you pass a value here, **the page will _not_ be saved!**

**Text Only** 
 If you pass a value to the $modx->event->output(), it must be text only! HTML tags are not allowed: they will cause the modal window to hang.

## Event Parameters

| Name | Description |
|------|-------------|
| mode | Either 'new' or 'upd', depending on the circumstances. |
| resource | A reference to the modResource object. |
| id | The ID of the Resource. Will be 0 for new Resources. |
## Examples

### Require a Field

``` php 
if (empty($resource->longtitle)) {
        $modx->event->output('Long title is required!'); // to modal window
        return '[MyPlugin] Failed to save page id '.$id.' due to missing longtitle'; // to the error log
}

```

### Calculate a Field Value

``` php 
if ($resource->get('parent') == 123) {
        $resource->set('template', 4);
}

```

**Saving Happens Automatically** 
 No need to run the `$resource->save()` method as that happens automatically.

## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")