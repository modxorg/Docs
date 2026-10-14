---
title: "OnUserGroupSave"
translation: "extending-modx/plugins/system-events/onusergroupsave"
description: "Событие запускается после сохранения группы пользователей."
---

## Событие: OnUserGroupSave

Событие запускается после сохранения группы пользователей, из метода `save` класса `modUserGroup`.

- Служба: 1 - Parser Service Events
- Group: User Groups

## Параметры события

| Имя       | Описание                                                                                 |
| --------- | ---------------------------------------------------------------------------------------- |
| mode      | `modSystemEvent::MODE_NEW` при создании группы пользователей, `modSystemEvent::MODE_UPD` при её обновлении. |
| usergroup | Ссылка на объект `modUserGroup`.                                                         |
| cacheFlag | Флаг кэширования, переданный в метод `save`.                                             |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
