---
title: "OnBeforeTempFormSave"
_old_id: "392"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforetempformsave"
---

## Event: OnBeforeTempFormSave

Fires after a form is submitted but before a Template is saved in the manager.

Service: 1 - Parser Service Events 
Group: Templates

## Event Parameters

| Name     | Description                                           |
| -------- | ----------------------------------------------------- |
| mode     | Either 'upd' or 'new', depending on the circumstance. |
| template | A reference to the modTemplate object.                |
| id       | The ID of the Template. Will be 0 for new Templates.  |

## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")