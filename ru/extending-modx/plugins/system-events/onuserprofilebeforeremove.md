---
title: "OnUserProfileBeforeRemove"
translation: "extending-modx/plugins/system-events/onuserprofilebeforeremove"
description: "Событие запускается непосредственно перед удалением профиля пользователя."
---

## Событие: OnUserProfileBeforeRemove

Событие запускается непосредственно перед удалением профиля пользователя, из метода `remove` класса `modUserProfile`.

- Служба: 1 - Parser Service Events
- Group: User Profiles

## Параметры события

| Имя         | Описание                                            |
| ----------- | --------------------------------------------------- |
| userprofile | Ссылка на объект `modUserProfile`.                  |
| ancestors   | Массив ID предков, переданный в метод `remove`.     |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
