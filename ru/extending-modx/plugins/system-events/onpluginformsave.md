---
title: "OnPluginFormSave"
translation: "extending-modx/plugins/system-events/onpluginformsave"
---

## Событие: OnPluginFormSave

Запускается после сохранения плагина в менеджере.

Служба: 1 - Parser Service Events
Группа: Plugins

## Параметры события

| Имя   | Описание                                              |
| ----- | ----------------------------------------------------- |
| mode  | Либо 'upd' или 'new', в зависимости от обстоятельств. |
| chunk | Ссылка на объект modPlugin.                           |
| id    | ID плагина.                                           |

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
