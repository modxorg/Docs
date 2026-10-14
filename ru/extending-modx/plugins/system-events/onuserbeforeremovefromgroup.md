---
title: "OnUserBeforeRemoveFromGroup"
translation: "extending-modx/plugins/system-events/onuserbeforeremovefromgroup"
description: "Событие запускается перед удалением пользователя из группы пользователей."
---

## Событие: OnUserBeforeRemoveFromGroup

Событие запускается перед удалением записи о членстве, когда пользователь удаляется из группы пользователей.

- Служба: 1 - Parser Service Events
- Group: User Groups

## Параметры события

| Имя       | Описание                                                       |
| --------- | -------------------------------------------------------------- |
| user      | Ссылка на объект `modUser`.                                    |
| usergroup | Ссылка на объект `modUserGroup`.                               |
| membership| Ссылка на удаляемый объект `modUserGroupMember`.               |

Возврат непустого сообщения из плагина предотвращает удаление.

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
