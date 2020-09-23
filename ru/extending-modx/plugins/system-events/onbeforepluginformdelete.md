---
title: "OnBeforePluginFormDelete"
translation: "extending-modx/plugins/system-events/onbeforepluginformdelete"
---

## Событие: OnBeforePluginFormDelete

Запускается до удаления плагина в панеле управления.

Служба: 1 - Parser Service Events
Группа: Plugins

## Параметры события

| Имя    | Описание                    |
| ------ | --------------------------- |
| plugin | Ссылка на объект modPlugin. |
| id     | Идентификатор плагина.      |

## Пример

Такой плагин выведет сообщение о том, что нельзя удалять плагин:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforePluginFormDelete':
        //если id плагина = 18, выведем сообщение
        if ($id == 18){
            $modx->event->output("Ты чего!? Нельзя удалять плагин ".$plugin->get('name'));
        }
        break;
}
```

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
