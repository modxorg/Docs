---
title: "OnCategoryBeforeSave"
translation: "extending-modx/plugins/system-events/oncategorybeforesave"
description: "Событие запускается непосредственно перед сохранением категории, в modCategory::save()."
---

## Событие: OnCategoryBeforeSave

Событие запускается непосредственно перед сохранением категории, в `modCategory::save()`.

- Служба: 1 - Parser Service Events
- Group: Categories

## Параметры события

| Имя       | Описание                                              |
| --------- | ----------------------------------------------------- |
| mode      | Либо 'new' или 'upd', в зависимости от обстоятельств. |
| category  | Ссылка на объект modCategory.                         |
| cacheFlag | Аргумент cacheFlag, переданный в метод save().        |

ID категории не передаётся отдельным параметром; используйте `$category->get('id')`.

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
