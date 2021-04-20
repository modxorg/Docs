---
title: "OnBeforeSnipFormSave"
_old_id: "390"
translation: "extending-modx/plugins/system-events/onbeforesnipformsave"
---

## Событие: OnBeforeSnipFormSave

Запускается после отправки формы, но до сохранения сниппета в менеджере.

Служба: 1 - Parser Service Events
Group: Snippets

## Параметры события

| Имя     | Описание                                              |
| ------- | ----------------------------------------------------- |
| mode    | Либо 'upd' или 'new', в зависимости от обстоятельств. |
| snippet | Ссылка на объект `modSnippet`.                          |
| id      | Идентификатор сниппета. Будет 0 для новых сниппетов.  |

## Примеры

Такой плагин выведет сообщение о том, что не заполнено поле `description`:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeSnipFormSave':
        if (!$snippet->get('description')){
            $modx->event->output("Голову ты дома не забыл, а про дескрипшен забыл!");
        }
        break;
}
```
                
Такой плагин запретит создавать новые сниппеты пользователю с `id=1`:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeSnipFormSave':
        //если это новый сниппет
        if ($mode == modSystemEvent::MODE_NEW){
            if ($modx->user->get('id') == 1){
                $modx->event->output("Тебе нельзя создавать новые сниппеты!");
            }
        }
        break;
}
```  

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
