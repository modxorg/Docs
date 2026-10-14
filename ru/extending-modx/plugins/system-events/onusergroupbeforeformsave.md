---
title: "OnUserGroupBeforeFormSave"
translation: "extending-modx/plugins/system-events/onusergroupbeforeformsave"
description: "Событие запускается перед сохранением группы пользователей из формы менеджера."
---

## Событие: OnUserGroupBeforeFormSave

Событие запускается перед сохранением группы пользователей через процессоры Create User Group и Update User Group в менеджере.

- Служба: 1 - Parser Service Events
- Group: User Groups

## Параметры события

| Имя        | Описание                                                                                                    |
| ---------- | ----------------------------------------------------------------------------------------------------------- |
| mode       | `modSystemEvent::MODE_NEW` при создании группы пользователей, `modSystemEvent::MODE_UPD` при её обновлении. |
| data       | Массив отправленных значений полей группы пользователей.                                                    |
| id         | ID группы пользователей или 0 при создании новой группы.                                                    |
| user_group | Ссылка на объект `modUserGroup`.                                                                            |
| object     | Ссылка на объект `modUserGroup`.                                                                            |

Возврат непустого сообщения из плагина предотвращает сохранение.

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
