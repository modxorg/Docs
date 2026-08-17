---
title: "OnBeforeDocFormSave"
_old_id: "381"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforedocformsave"
description: "Plugin event fired before the Manager Resource create/update processor saves the resource"
---

## Event: OnBeforeDocFormSave

Fires in the Manager **before** the Resource create or update processor persists the Resource. Use it to change fields on the `$resource` object, or to block the save.

- Service: 1 - Parser Service Events
- Group: Documents

Fired from `MODX\Revolution\Processors\Resource\Create` and `Update` (also `UpdateFromGrid`). Flow in those processors:

1. Fields are applied to the Resource object
2. `OnBeforeDocFormSave` runs
3. The processor calls `$resource->save()`
4. After-save work runs (TVs on update, resource groups, and so on)
5. `OnDocFormSave` runs

### Changing fields vs calling `save()`

For Resource fields, call `$resource->set(...)`. You do **not** need `$resource->save()` in the plugin. The processor saves after your plugin returns.

Do **not** call `$resource->save()` here unless you have a rare reason to persist early. An early `save()` can write the row before Template Variables and related after-save steps run, and it muddies create vs update timing. Prefer [OnDocFormSave](extending-modx/plugins/system-events/ondocformsave) for TV changes (`setTVValue`).

### Blocking the save

Plugins should return nothing (or an empty value) on success. A non-empty return value is treated as an error message and is logged; depending on how it is returned it may still allow the save to continue.

To **stop** the save and show a message in the Manager, pass text to `$modx->event->output(...)`. That text must be plain text (no HTML), or the modal can hang.

## Event Parameters

| Name | Description |
| --- | --- |
| mode | `new` or `upd` (`modSystemEvent::MODE_NEW` / `MODE_UPD`) |
| resource | Reference to the `modResource` object (passed by reference) |
| id | Resource ID. `0` for new Resources that are not saved yet |

## Examples

### Require a field

``` php
if (empty($resource->get('longtitle'))) {
    $modx->event->output('Long title is required!');
    return;
}
```

### Set a field before the processor saves

``` php
if ((int) $resource->get('parent') === 123) {
    $resource->set('template', 4);
}
```

No `$resource->save()` here. The create/update processor saves next.

### Block create, or updates missing introtext

``` php
<?php
switch ($modx->event->name) {
    case 'OnBeforeDocFormSave':
        if ($mode == modSystemEvent::MODE_UPD) {
            if (!$resource->get('introtext')) {
                $modx->event->output("Please fill in the Intro Text field.");
            }
        } elseif ($mode == modSystemEvent::MODE_NEW) {
            $modx->event->output("You cannot create resources!");
        }
        break;
}
```

### Force a template for root resources

``` php
<?php
switch ($modx->event->name) {
    case 'OnBeforeDocFormSave':
        if ((int) $resource->get('parent') === 0) {
            $resource->set('template', 1);
        }
        break;
}
```

## See Also

- [OnDocFormSave](extending-modx/plugins/system-events/ondocformsave)
- [System Events](extending-modx/plugins/system-events)
- [Plugins](extending-modx/plugins)
