---
title: "OnPluginBeforeSave"
translation: "extending-modx/plugins/system-events/onpluginbeforesave"
description: "Событие запускается непосредственно перед сохранением плагина."
---

## Событие: OnPluginBeforeSave

Событие запускается непосредственно перед сохранением плагина.

- Служба: 1 - Parser Service Events
- Group: Plugins

## Параметры события

| Имя       | Описание                                       |
| --------- | ---------------------------------------------- |
| mode      | `'new'` или `'upd'` в зависимости от ситуации. |
| plugin    | Ссылка на объект `modPlugin`.                  |
| cacheFlag | Флаг кэша, переданный в операцию сохранения.   |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
