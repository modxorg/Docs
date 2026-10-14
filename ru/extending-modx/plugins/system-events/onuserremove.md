---
title: "OnUserRemove"
translation: "extending-modx/plugins/system-events/onuserremove"
description: "Срабатывает после удаления пользователя, в modUser::remove()."
---

## Событие: OnUserRemove

Срабатывает после удаления пользователя.

- Служба: 1 - Parser Service Events
- Group: Users

## Параметры события

| Имя        | Описание                                         |
| ---------- | ------------------------------------------------ |
| user       | Ссылка на объект modUser.                        |
| ancestors  | Массив предков, переданный в метод remove().     |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
