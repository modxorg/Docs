---
title: "OnDocFormDelete"
description: "Fires after a Resource is deleted in the Manager."
---

## Event: OnDocFormDelete

Fires after a Resource is deleted in the Manager, from the `Resource\Delete` processor.

- Service: 1 - Parser Service Events
- Group: Resources

## Event Parameters

| Name     | Description                                 |
| -------- | ------------------------------------------- |
| id       | The ID of the Resource.                     |
| children | IDs of the child Resources deleted with it. |
| resource | A reference to the modResource object.      |

## Example

This plugin logs the deleted Resource together with its children:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnDocFormDelete':
        $modx->log(modX::LOG_LEVEL_ERROR, 'Resource '.$id.' was deleted');
        foreach ($children as $childId) {
            $child = $modx->getObject('modResource', $childId);
            if ($child) {
                $modx->log(modX::LOG_LEVEL_ERROR, 'Child deleted: '.$child->get('pagetitle'));
            }
        }
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
