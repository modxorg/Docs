---
title: "OnDocFormSave"
description: "Fires after a Resource is saved in the Manager."
---

## Event: OnDocFormSave

Fires after a Resource is saved in the Manager through the `Resource\Create` and `Resource\Update` processors. Also fires when a deleted Resource is edited inline in the trash grid (`Resource\UpdateFromGrid`).

- Service: 1 - Parser Service Events
- Group: Resources

**Change TVs here.** To change TV values, do it here, not in [OnBeforeDocFormSave](extending-modx/plugins/system-events/onbeforedocformsave "OnBeforeDocFormSave"). Unlike that event, this one does not support `$modx->event->output()`.

**Saving happens automatically.** You do not need to call `$resource->save()`.

Anything you return from this event is written to the error log.

## Event Parameters

| Name       | Description                                                                                |
| ---------- | ------------------------------------------------------------------------------------------ |
| mode       | Either `new` or `upd` (`modSystemEvent::MODE_NEW` / `MODE_UPD`).                           |
| id         | The ID of the Resource, even for new Resources.                                            |
| resource   | A reference to the modResource object.                                                     |
| reloadOnly | Only on creation: `true` when the processor just reloads the form after a validation error. |
| object     | Only on update: alias of `resource` — a reference to the same object.                       |

## Examples

### Read the Resource ID

``` php
// Log all available properties of the $resource
$modx->log(modX::LOG_LEVEL_ERROR, print_r($resource->toArray(),true) );
// Get the page id
$page_id = $resource->get('id');
// or simply
$page_id = $id;

if ($mode == 'new') {
    // resource created
}
else {
   // existing resource was updated
}
```

### Set a TV value

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnDocFormSave':
        //if the resource has a template=5
        if ($resource->get('template') == 5) {
            // after saving the TV value price=128
            if(!$resource->setTVValue('price', '128')) {
                $modx->log(modX::LOG_LEVEL_ERROR, 'Having problems setting the TV value.');
            }
        }
        break;
}
```

Whether the `price` TV was filled in before saving does not matter: the plugin writes 128.

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
