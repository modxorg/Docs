---
title: "OnUserGroupFormRemove"
translation: "extending-modx/plugins/system-events/onusergroupformremove"
description: "Событие запускается после удаления группы пользователей из формы менеджера."
---

## Событие: OnUserGroupFormRemove

Событие запускается после удаления группы пользователей через процессор Remove User Group в менеджере.

- Служба: 1 - Parser Service Events
- Group: User Groups

## Параметры события

| Имя        | Описание                           |
| ---------- | ---------------------------------- |
| id         | ID удалённой группы пользователей. |
| user_group | Ссылка на объект `modUserGroup`.   |
| object     | Ссылка на объект `modUserGroup`.   |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
