---
title: "OnPluginEventBeforeSave"
translation: "extending-modx/plugins/system-events/onplugineventbeforesave"
description: "Событие запускается непосредственно перед сохранением привязки плагина к событию."
---

## Событие: OnPluginEventBeforeSave

Событие запускается непосредственно перед сохранением привязки плагина к событию.

- Служба: 1 - Parser Service Events
- Group: Plugin Events

## Параметры события

| Имя         | Описание                                                                                                                                |
| ----------- | --------------------------------------------------------------------------------------------------------------------------------------- |
| mode        | `'new'` (`modSystemEvent::MODE_NEW`) или `'upd'` (`modSystemEvent::MODE_UPD`) в зависимости от того, новый это объект или существующий. |
| pluginEvent | Ссылка на объект `modPluginEvent`.                                                                                                      |
| cacheFlag   | Флаг кэширования, переданный в операцию сохранения.                                                                                     |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
