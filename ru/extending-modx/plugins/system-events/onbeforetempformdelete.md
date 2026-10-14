---
title: "OnBeforeTempFormDelete"
translation: "extending-modx/plugins/system-events/onbeforetempformdelete"
description: "Событие запускается перед удалением шаблона в менеджере."
---

## Событие: OnBeforeTempFormDelete

Событие запускается перед удалением шаблона в менеджере.

- Служба: 1 - Parser Service Events
- Group: Templates

## Параметры события

| Имя      | Описание                                        |
| -------- | ----------------------------------------------- |
| template | Ссылка на объект modTemplate.                   |
| id       | Идентификатор шаблона.                          |
| object   | Псевдоним `template` — ссылка на тот же объект. |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
