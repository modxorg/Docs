---
title: "OnPluginEventRemove"
translation: "extending-modx/plugins/system-events/onplugineventremove"
description: "Событие запускается после того, как плагин отсоединяется непосредственно от события."
---

## Событие: OnPluginEventRemove

Событие запускается после того, как плагин отсоединяется непосредственно от события.

- Служба: 1 - Parser Service Events
- Group: Plugin Events

## Параметры события

| Имя         | Описание                                             |
| ----------- | ---------------------------------------------------- |
| pluginEvent | Ссылка на объект `modPluginEvent`.                   |
| ancestors   | Массив предков для каскадной операции удаления.      |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
