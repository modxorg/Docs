---
title: "OnDocFormSave"
_old_id: "422"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/ondocformsave"
---

Event: OnDocFormSave
--------------------

Fires after a Resource is saved in the manager via the editing form.

Service: 1 - Parser Service Events   
Group: Documents

<div class="tip">**TVs are best Modified Here**  
If you need to modify TV values, it's best to modify them here and not during [OnBeforeDocFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforedocformsave "OnBeforeDocFormSave").</div>Unlike [OnBeforeDocFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforedocformsave "OnBeforeDocFormSave"), this event does not support the $modx->event->output() method.

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>mode</td><td>Either 'new' or 'upd', depending on the circumstances.</td></tr><tr><td>resource</td><td>A reference to the modResource object.</td></tr><tr><td>id</td><td>The ID of the Resource (even for new resources)</td></tr></tbody></table>Examples
--------

To do something with the page ID (e.g. to update a related custom table), you can read this out of the **$resource** object (even if you are creating a new resource):

```
<pre class="brush: php">
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

```Anything you return from this event will be written to the logs, e.g.

```
<pre class="brush: php">
return "Help I'm a bug!";

```Will result in a log message like the following:

```
<pre class="brush: php">
 [2012-06-22 13:00:28] (ERROR @ /connectors/resource/index.php) [OnDocFormSave]Help I'm a bug!

```### Calculating a TV Value

```
<pre class="brush: php">
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

```<div class="tip">**Saving Happens Automatically**  
No need to run the `$resource->save()` method as that happens automatically.</div>See Also
--------

- [System Events](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](/revolution/2.x/developing-in-modx/basic-development/plugins "Plugins")