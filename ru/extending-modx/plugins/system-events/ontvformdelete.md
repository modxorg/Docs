---
title: "OnTVFormDelete"
translation: "extending-modx/plugins/system-events/ontvformdelete"
description: "Событие запускается после удаления TV в менеджере."
---

## Событие: OnTVFormDelete

Событие запускается после удаления TV в менеджере.

- Служба: 1 - Parser Service Events
- Group: Template Variables

## Параметры события

| Имя    | Описание                                                          |
| ------ | ----------------------------------------------------------------- |
| id     | ID удалённой TV.                                                  |
| tv     | Ссылка на объект `modTemplateVar`.                                |
| object | Ссылка на объект `modTemplateVar` — тот же экземпляр, что и `tv`. |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
