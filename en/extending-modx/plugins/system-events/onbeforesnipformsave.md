---
title: "OnBeforeSnipFormSave"
_old_id: "390"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforesnipformsave"
---

## Event: OnBeforeSnipFormSave

Fires after a form is submitted but before a Snippet is saved in the manager.

- Service: 1 - Parser Service Events
- Group: Snippets

## Event Parameters

| Name    | Description                                           |
| ------- | ----------------------------------------------------- |
| mode    | Either 'upd' or 'new', depending on the circumstance. |
| snippet | A reference to the modSnippet object.                 |
| id      | The ID of the Snippet. Will be 0 for new Snippets.    |

## Examples of

Such a plugin will display a message stating that the field is not filled `description`:

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
                
Such a plugin will prevent the user from creating new snippets with `id=1`:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeSnipFormSave':
        //если это новый сниппет
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
