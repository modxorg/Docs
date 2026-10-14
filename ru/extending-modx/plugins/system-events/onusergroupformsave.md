---
title: "OnUserGroupFormSave"
translation: "extending-modx/plugins/system-events/onusergroupformsave"
description: "Событие запускается после сохранения группы пользователей из формы менеджера."
---

## Событие: OnUserGroupFormSave

Событие запускается после сохранения группы пользователей через процессоры Create User Group и Update User Group в менеджере.

- Служба: 1 - Parser Service Events
- Group: User Groups

## Параметры события

| Имя        | Описание                                                                                                    |
| ---------- | ----------------------------------------------------------------------------------------------------------- |
| mode       | `modSystemEvent::MODE_NEW` при создании группы пользователей, `modSystemEvent::MODE_UPD` при её обновлении. |
| id         | ID группы пользователей.                                                                                    |
| user_group | Ссылка на объект `modUserGroup`.                                                                            |
| object     | Ссылка на объект `modUserGroup`.                                                                            |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
