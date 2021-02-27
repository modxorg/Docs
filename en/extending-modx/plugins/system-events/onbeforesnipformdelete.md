---
title: "OnBeforeSnipFormDelete"
_old_id: "389"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforesnipformdelete"
---

## Event: OnBeforeSnipFormDelete

Fires before a Snippet is deleted in the manager.

- Service: 1 - Parser Service Events
- Group: Snippets

## Event Parameters

| Name    | Description                           |
| ------- | ------------------------------------- |
| snippet | A reference to the modSnippet object. |
| id      | The ID of the Snippet.                |

## Example

Such a plugin will display a message stating that you cannot delete snippets:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeSnipFormDelete':
        $modx->event->output("You cannot delete snippets!?");
        break;
}

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
