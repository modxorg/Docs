---
title: "OnPluginSave"
translation: "extending-modx/plugins/system-events/onpluginsave"
description: "Событие запускается сразу после изменения базы данных."
---

## Событие: OnPluginSave

Событие запускается сразу после изменения базы данных.

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
