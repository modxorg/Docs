---
title: "OnUserGroupBeforeRemove"
translation: "extending-modx/plugins/system-events/onusergroupbeforeremove"
description: "Событие запускается непосредственно перед удалением группы пользователей."
---

## Событие: OnUserGroupBeforeRemove

Событие запускается непосредственно перед удалением группы пользователей, из метода `remove` класса `modUserGroup`.

- Служба: 1 - Parser Service Events
- Group: User Groups

## Параметры события

| Имя       | Описание                                        |
| --------- | ----------------------------------------------- |
| usergroup | Ссылка на объект `modUserGroup`.                |
| ancestors | Массив ID предков, переданный в метод `remove`. |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
