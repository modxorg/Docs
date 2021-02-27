---
title: "OnBeforePluginFormSave"
translation: "extending-modx/plugins/system-events/onbeforepluginformsave"
---

## Событие: OnBeforePluginFormSave

Запускается после отправки, но до того, как плагин будет сохранен в панеле управления.

Служба: 1 - Parser Service Events
Group: Plugin

## Параметры события

| Имя    | Описание                                              |
| ------ | ----------------------------------------------------- |
| mode   | Либо 'upd' или 'new', в зависимости от обстоятельств. |
| plugin | Ссылка на объект modPlugin.                           |
| id     | Идентификатор плагина. Будет 0 для новых плагинов.    |

## Примеры

Такой плагин выведет сообщение о том, что не заполнено поле `description`:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforePluginFormSave':
        if (!$plugin->get('description')){
            $modx->event->output("Голову ты дома не забыл, а про дескрипшен забыл! =)");
        }
        break;
}
```
                
Такой плагин запретит создавать новые плагины пользователю с `id=1`:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforePluginFormSave':
        //если это новый плагин
        if ($mode == modSystemEvent::MODE_NEW){
            if ($modx->user->get('id') == 1){
                $modx->event->output("Тебе нельзя создавать новые плагины!");
            }
        }
        break;
}
```       

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
