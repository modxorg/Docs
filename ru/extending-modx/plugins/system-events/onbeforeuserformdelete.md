---
title: "OnBeforeUserFormDelete"
translation: "extending-modx/plugins/system-events/onbeforeuserformdelete"
description: "Событие запускается перед удалением пользователя в менеджере."
---

## Событие: OnBeforeUserFormDelete

Событие запускается перед удалением пользователя в менеджере.

- Служба: 1 - Parser Service Events
- Group: Users

## Параметры события

| Имя    | Описание                                    |
| ------ | ------------------------------------------- |
| user   | Ссылка на объект modUser.                   |
| id     | Идентификатор пользователя.                 |
| object | Псевдоним `user` — ссылка на тот же объект. |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
