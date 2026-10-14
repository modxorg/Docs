---
title: "OnPluginFormSave"
translation: "extending-modx/plugins/system-events/onpluginformsave"
description: "Событие запускается после сохранения плагина в менеджере."
---

## Событие: OnPluginFormSave

Событие запускается после сохранения плагина в менеджере.

- Служба: 1 - Parser Service Events
- Group: Plugins

## Параметры события

| Имя    | Описание                                                         |
| ------ | ---------------------------------------------------------------- |
| mode   | `'new'` или `'upd'` в зависимости от ситуации.                   |
| id     | Идентификатор плагина.                                           |
| plugin | Ссылка на объект `modPlugin`.                                    |
| object | Ссылка на объект `modPlugin` — тот же экземпляр, что и `plugin`. |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
