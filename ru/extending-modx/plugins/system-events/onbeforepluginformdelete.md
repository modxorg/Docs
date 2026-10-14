---
title: "OnBeforePluginFormDelete"
translation: "extending-modx/plugins/system-events/onbeforepluginformdelete"
description: "Событие запускается перед удалением плагина в менеджере."
---

## Событие: OnBeforePluginFormDelete

Событие запускается перед удалением плагина в менеджере.

- Служба: 1 - Parser Service Events
- Group: Plugins

## Параметры события

| Имя    | Описание                                      |
| ------ | --------------------------------------------- |
| plugin | Ссылка на объект modPlugin.                   |
| id     | Идентификатор плагина.                        |
| object | Псевдоним `plugin` — ссылка на тот же объект. |


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

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
