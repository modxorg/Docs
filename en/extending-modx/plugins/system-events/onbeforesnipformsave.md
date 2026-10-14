---
title: "OnBeforeSnipFormSave"
description: "Fires before a Snippet is saved in the Manager."
_old_id: "390"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforesnipformsave"
---

## Event: OnBeforeSnipFormSave

Fires after a form is submitted but before a Snippet is saved in the Manager.

- Service: 1 - Parser Service Events
- Group: Snippets

## Event Parameters

| Name    | Description                                           |
| ------- | ----------------------------------------------------- |
| mode    | Either 'upd' or 'new', depending on the circumstance. |
| snippet | A reference to the modSnippet object.                 |
| id      | The ID of the Snippet. Will be 0 for new Snippets.    |
| data    | The current fields of the Snippet as an array.        |
| object  | Alias of `snippet` — a reference to the same object.  |

## Examples

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeSnipFormSave':
        if (!$snippet->get('description')){
            $modx->event->output("You haven't forgotten your head at home, but you forgot about the description! =)");
        }
        break;
}
```

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeSnipFormSave':
        // if it's a new snippet
        if ($mode == modSystemEvent::MODE_NEW){
            if ($modx->user->get('id') == 1){
                $modx->event->output("You are not allowed to create new snippets!");
            }
        }
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
