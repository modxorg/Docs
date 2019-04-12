---
title: "OnDocFormSave"
_old_id: "422"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/ondocformsave"
---

## Event: OnDocFormSave

Fires after a Resource is saved in the manager via the editing form.

Service: 1 - Parser Service Events
Group: Documents

**TVs are best Modified Here**
If you need to modify TV values, it's best to modify them here and not during [OnBeforeDocFormSave](extending-modx/plugins/system-events/onbeforedocformsave "OnBeforeDocFormSave").

Unlike [OnBeforeDocFormSave](extending-modx/plugins/system-events/onbeforedocformsave "OnBeforeDocFormSave"), this event does not support the $modx->event->output() method.

## Event Parameters

| Name     | Description                                            |
| -------- | ------------------------------------------------------ |
| mode     | Either 'new' or 'upd', depending on the circumstances. |
| resource | A reference to the modResource object.                 |
| id       | The ID of the Resource (even for new resources)        |

## Examples

To do something with the page ID (e.g. to update a related custom table), you can read this out of the **$resource** object (even if you are creating a new resource):

``` php
// Log all available properties of the $resource
$modx->log(MODX_LOG_LEVEL_ERROR, print_r($resource->toArray(),true) );
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

Anything you return from this event will be written to the logs, e.g.

``` php
return "Help I'm a bug!";
```

Will result in a log message like the following:

``` php
 [2012-06-22 13:00:28] (ERROR @ /connectors/resource/index.php) [OnDocFormSave]Help I'm a bug!
```

### Calculating a TV Value

``` php
switch ($modx->event->name) {

        // Documents
        case 'OnDocFormSave':
            if ($resource->get('template') == 8) {  
                if(!$resource->setTVValue('my_tv', 'Some Value')) {
                    $modx->log(modX::LOG_LEVEL_ERROR, 'There was a problem setting the TV value.');
                }
            }

        break;
}
```

**Saving Happens Automatically**
No need to run the `$resource->save()` method as that happens automatically.

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
