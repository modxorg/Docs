---
title: "OnPluginRemove"
translation: "extending-modx/plugins/system-events/onpluginremove"
description: "Событие запускается сразу после удаления плагина из базы данных."
---

## Событие: OnPluginRemove

Событие запускается сразу после удаления плагина из базы данных.

- Служба: 1 - Parser Service Events
- Group: Plugins

## Параметры события

| Имя       | Описание                                        |
| --------- | ----------------------------------------------- |
| plugin    | Ссылка на объект `modPlugin`.                   |
| ancestors | Массив предков для каскадной операции удаления. |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
