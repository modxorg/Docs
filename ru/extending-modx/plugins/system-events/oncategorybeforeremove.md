---
title: "OnCategoryBeforeRemove"
translation: "extending-modx/plugins/system-events/oncategorybeforeremove"
description: "Событие запускается непосредственно перед удалением категории, в modCategory::remove()."
---

## Событие: OnCategoryBeforeRemove

Событие запускается непосредственно перед удалением категории, в `modCategory::remove()`.

- Служба: 1 - Parser Service Events
- Group: Categories

## Параметры события

| Имя       | Описание                                     |
| --------- | -------------------------------------------- |
| category  | Ссылка на объект modCategory.                |
| ancestors | Массив предков, переданный в метод remove(). |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
