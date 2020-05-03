---
title: "OnDocFormRender"
_old_id: "421"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/ondocformrender"
---

## Event: OnDocFormRender

Fires after a Resource editing form is loaded in the manager. Useful for inserting HTML into forms, and as of 2.4 for setting several default values on new resources

- Service: 1 - Parser Service Events
- Group: Documents

## Event Parameters

| Name     | Description                                                                                                                                               |
| -------- | --------------------------------------------------------------------------------------------------------------------------------------------------------- |
| mode     | Either 'new' or 'upd', depending on the circumstance.                                                                                                     |
| resource | A reference to the modResource object. Since 2.4, this will contain an empty resource object when creating a new resource. Before 2.4 this would be null. |
| id       | The ID of the Resource. Will be 0 for new Resources.                                                                                                      |

## Setting Default Resource Values

As of Revolution 2.4.0, you can use a plugin OnDocFormRender for setting a value for one of the following fields:

- pagetitle
- longtitle
- description
- introtext
- content
- link\_attributes
- alias
- menutitle

It is advised to only do this on new resources, as any values you set **will** override existing resource values.

Here is how you might use it:

``` php
switch ($modx->event->name) {
  case 'OnDocFormRender':
    if ($mode === 'new') {
      $resource->set('pagetitle', 'This is a default pagetitle');
    }
    break;
}

```

See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
