---
title: "OnCategoryRemove"
translation: "extending-modx/plugins/system-events/oncategoryremove"
description: "Событие запускается после удаления категории, в modCategory::remove()."
---

## Событие: OnCategoryRemove

Событие запускается после удаления категории, в `modCategory::remove()`.

- Служба: 1 - Parser Service Events
- Group: Categories

## Параметры события

| Имя       | Описание                                           |
| --------- | -------------------------------------------------- |
| category  | Ссылка на объект modCategory.                      |
| ancestors | Массив предков, переданный в метод remove().       |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
