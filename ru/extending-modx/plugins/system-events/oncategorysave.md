---
title: "OnCategorySave"
translation: "extending-modx/plugins/system-events/oncategorysave"
description: "Событие запускается после сохранения категории, в modCategory::save()."
---

## Событие: OnCategorySave

Событие запускается после сохранения категории, в `modCategory::save()`.

- Служба: 1 - Parser Service Events
- Group: Categories

## Параметры события

| Имя       | Описание                                              |
| --------- | ----------------------------------------------------- |
| mode      | Либо 'new' или 'upd', в зависимости от обстоятельств. |
| category  | Ссылка на объект modCategory.                         |
| cacheFlag | Аргумент cacheFlag, переданный в метод save().        |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
