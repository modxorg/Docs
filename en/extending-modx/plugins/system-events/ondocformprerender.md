---
title: "OnDocFormPrerender"
description: "Fires before a Resource editing form is loaded in the Manager."
---

## Event: OnDocFormPrerender

Fires before a Resource editing form is loaded in the Manager.

- Service: 1 - Parser Service Events
- Group: Resources

## Event Parameters

| Name     | Description                                                          |
| -------- | -------------------------------------------------------------------- |
| mode     | Either `new` or `upd` (`modSystemEvent::MODE_NEW` / `MODE_UPD`).     |
| id       | The ID of the Resource. This will be 0 for new Resources.            |
| resource | A reference to the modResource object. Not passed for new Resources. |

For a new Resource the `resource` parameter is absent from the event data; before 2.4 it was `null`. Check with `isset($resource)`, not `$resource === null`.

## Example

This plugin shows a click message on the pagetitle field and a heading above the form:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnDocFormPrerender':
        $modx->regClientStartupHTMLBlock('
        <script type="text/javascript">
        Ext.onReady(function() {
            Ext.select("#modx-resource-pagetitle").on("click", function() {
                Ext.MessageBox.alert("Attention", "You just clicked on pagetitle.");
            });
        });
        </script>');
        $modx->event->output('<h2>Hello my friend!</h2>');
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
