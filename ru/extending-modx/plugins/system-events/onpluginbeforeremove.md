---
title: "OnPluginBeforeRemove"
translation: "extending-modx/plugins/system-events/onpluginbeforeremove"
description: "Событие запускается непосредственно перед удалением плагина."
---

## Событие: OnPluginBeforeRemove

Событие запускается непосредственно перед удалением плагина.

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
