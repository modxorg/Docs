---
title: "OnUserRemoveFromGroup"
translation: "extending-modx/plugins/system-events/onuserremovefromgroup"
description: "Событие запускается после удаления пользователя из группы пользователей."
---

## Событие: OnUserRemoveFromGroup

Событие запускается после удаления записи о членстве, когда пользователь удаляется из группы пользователей.

- Служба: 1 - Parser Service Events
- Group: User Groups

## Параметры события

| Имя       | Описание                                                 |
| --------- | -------------------------------------------------------- |
| user      | Ссылка на объект `modUser`.                              |
| usergroup | Ссылка на объект `modUserGroup`.                         |
| membership| Ссылка на удалённый объект `modUserGroupMember`.         |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
