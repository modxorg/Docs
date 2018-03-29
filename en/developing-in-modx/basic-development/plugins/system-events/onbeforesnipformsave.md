---
title: "OnBeforeSnipFormSave"
_old_id: "390"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforesnipformsave"
---

## Event: OnBeforeSnipFormSave

Fires after a form is submitted but before a Snippet is saved in the manager.

Service: 1 - Parser Service Events 
Group: Snippets

## Event Parameters

| Name | Description |
|------|-------------|
| mode | Either 'upd' or 'new', depending on the circumstance. |
| snippet | A reference to the modSnippet object. |
| id | The ID of the Snippet. Will be 0 for new Snippets. |
## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")