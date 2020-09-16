---
title: "OnDocFormPrerender"
_old_id: "420"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/ondocformprerender"
---

## Event: OnDocFormPrerender

Fires before a Resource editing form is loaded in the manager.

- Service: 1 - Parser Service Events
- Group: Documents

## Event Parameters

| Name     | Description                                                            |
| -------- | ---------------------------------------------------------------------- |
| mode     | Either 'new' or 'upd', depending on the circumstance.                  |
| resource | A reference to the modResource object. Will be null for new Resources. |
| id       | The ID of the Resource. Will be 0 for new Resources.                   |

## Example

Such a plugin will display a message when you click on the pagetitle and add text to the page:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnDocFormPrerender':
        $modx->regClientStartupHTMLBlock('
        <script type="text/javascript">
    		Ext.onReady(function() {
                var pagetitle = Ext.select("#modx-resource-pagetitle");
                pagetitle.on("click",function(node,e){
                    Ext.MessageBox.alert("Attention","You just clicked on pagetitle.");
                    
                },pagetitle);
    		});
    	</script>');
    	$modx->event->output('<h2 style="padding: 50px 0 0 15px;">Hello my friend!</h2>');
        break;
}
```  

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
