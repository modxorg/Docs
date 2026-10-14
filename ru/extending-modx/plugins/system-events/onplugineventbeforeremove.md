---
title: "OnPluginEventBeforeRemove"
translation: "extending-modx/plugins/system-events/onplugineventbeforeremove"
description: "Событие запускается непосредственно перед отвязкой плагина от события."
---

## Событие: OnPluginEventBeforeRemove

Событие запускается непосредственно перед отвязкой плагина от события.

- Служба: 1 - Parser Service Events
- Group: Plugin Events

## Параметры события

| Имя        | Описание                                               |
| ---------- | ------------------------------------------------------ |
| pluginEvent| Ссылка на объект `modPluginEvent`.                     |
| ancestors  | Массив предков для каскадной операции удаления.        |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
