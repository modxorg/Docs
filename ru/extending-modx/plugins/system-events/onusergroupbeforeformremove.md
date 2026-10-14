---
title: "OnUserGroupBeforeFormRemove"
translation: "extending-modx/plugins/system-events/onusergroupbeforeformremove"
description: "Событие запускается перед удалением группы пользователей из формы менеджера."
---

## Событие: OnUserGroupBeforeFormRemove

Событие запускается перед удалением группы пользователей через процессор Remove User Group в менеджере.

- Служба: 1 - Parser Service Events
- Group: User Groups

## Параметры события

| Имя        | Описание                           |
| ---------- | ---------------------------------- |
| id         | ID удаляемой группы пользователей. |
| user_group | Ссылка на объект `modUserGroup`.   |
| object     | Ссылка на объект `modUserGroup`.   |

Возврат непустого сообщения из плагина предотвращает удаление.

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
