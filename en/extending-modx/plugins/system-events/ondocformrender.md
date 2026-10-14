---
title: "OnDocFormRender"
description: "Fires after a Resource editing form is loaded in the Manager."
---

## Event: OnDocFormRender

Fires after a Resource editing form is loaded in the Manager. Use it to insert HTML straight into the form.

- Service: 1 - Parser Service Events
- Group: Resources

## Event Parameters

| Name     | Description                                                                                            |
| -------- | ------------------------------------------------------------------------------------------------------ |
| mode     | Either `new` or `upd` (`modSystemEvent::MODE_NEW` / `MODE_UPD`).                                       |
| id       | The ID of the Resource. This will be 0 for new Resources.                                              |
| resource | A reference to the modResource object. Since 2.4 an empty object for new Resources; before 2.4 `null`. |

## Setting Default Resource Values

Since Revolution 2.4.0, a plugin on OnDocFormRender can set a value for one of the following fields:

- `pagetitle`
- `longtitle`
- `description`
- `introtext`
- `content`
- `link_attributes`
- `alias`
- `menutitle`

Do this only on new Resources: on existing ones, the values you set **will** override the current ones.

``` php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnDocFormRender':
        if ($mode == modSystemEvent::MODE_NEW) {
            // set default values
            $resource->set('pagetitle', 'Heading');
            $resource->set('description', 'Description');
            $resource->set('content', 'Content');
        }
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
