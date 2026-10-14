---
title: "OnUserSave"
translation: "extending-modx/plugins/system-events/onusersave"
description: "Срабатывает после сохранения пользователя, в modUser::save()."
---

## Событие: OnUserSave

Срабатывает, когда пользователь сохраняется.

- Служба: 1 - Parser Service Events
- Group: Users

## Параметры события

| Имя       | Описание                                                                                                                                        |
| --------- | ----------------------------------------------------------------------------------------------------------------------------------------------- |
| user      | Ссылка на объект modUser.                                                                                                                       |
| mode      | Либо 'new' (modSystemEvent::MODE\_NEW) либо 'upd' (modSystemEvent::MODE\_UPD) в зависимости от того, новый это объект или существующий.          |
| cacheFlag | Аргумент cacheFlag, переданный в метод save().                                                                                                   |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
