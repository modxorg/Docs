---
title: "Action List"
_old_id: "342"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-manager-pages/actions-and-menus/action-list"
---

 MODX Revolution uses the **a** parameter in the $\_GET array to define actions in the manager. Before MODX 2.3 each action has its own ID, but as of MODX 2.3 actions have been deprecated and are no longer used. Instead, as of Revolution 2.3, the action name is passed in the **a** parameter directly.

Actions in JavaScript
---------------------

Within the Manager, you can access a list of actions with the MODx.action variable. Do NOT rely on any list with manager action IDs as these IDs are not hardcoded in the MODX Core, but instead they are dynamically created during setup and just happen to have a certain ID.

Back in Evolution there was indeed a fixed list, but there has never been one in Revolution.

### Before Revolution 2.3

To redirect the browser to edit a resource with ID 5:

`MODx.loadPage(MODx.action['resource/update'], 'id=5');`To redirect the browser to a custom manager page controller named "update" in the "mycomponent" namespace, passing along some url parameters:

```
MODx.loadPage(MODx.action['mycomponent:update'], 'foo=bar&bar=foo');
// Prior to Revo 2.2 you would need to use this, but risked collisions with core or other packages 
MODx.loadPage(MODx.action['update'], 'foo=bar&bar=foo'); 
```### Revolution 2.3+

As of Revolution 2.3, actions and their IDs have been deprecated. Instead, you can access controllers directly by passing the controller name (which was previously stored in the action), into the **a** parameter, and specifying a **namespace** parameter as well. Specifying the namespace is not needed when requesting a MODX core controller.

```
MODx.loadPage('resource/update', 'id=5');
MODx.loadPage('update', 'namespace=mycomponent&foo=bar&bar=foo');
```For backwards compatibility, the MODx.action variable is still present in 2.3, but instead of IDs it contains the controller names as usual. This variable will be removed in 2.4 or 3.0 though, so do NOT rely on it for too long.