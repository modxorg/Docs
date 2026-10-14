---
title: "OnPluginFormDelete"
translation: "extending-modx/plugins/system-events/onpluginformdelete"
description: "Событие запускается после удаления плагина в менеджере."
---

## Событие: OnPluginFormDelete

Событие запускается после удаления плагина.

- Служба: 1 - Parser Service Events
- Group: Plugins

## Параметры события

| Имя    | Описание                                                         |
| ------ | ---------------------------------------------------------------- |
| id     | Идентификатор плагина.                                           |
| plugin | Ссылка на объект `modPlugin`.                                    |
| object | Ссылка на объект `modPlugin` — тот же экземпляр, что и `plugin`. |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
