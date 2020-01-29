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

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
