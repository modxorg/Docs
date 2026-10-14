---
title: "OnUserProfileRemove"
translation: "extending-modx/plugins/system-events/onuserprofileremove"
description: "Событие запускается после удаления профиля пользователя."
---

## Событие: OnUserProfileRemove

Событие запускается после удаления профиля пользователя, из метода `remove` класса `modUserProfile`.

- Служба: 1 - Parser Service Events
- Group: User Profiles

## Параметры события

| Имя         | Описание                                        |
| ----------- | ----------------------------------------------- |
| userprofile | Ссылка на объект `modUserProfile`.              |
| ancestors   | Массив ID предков, переданный в метод `remove`. |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
