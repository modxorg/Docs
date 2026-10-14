---
title: "OnResourceDuplicate"
translation: "extending-modx/plugins/system-events/onresourceduplicate"
description: "Событие запускается сразу после дублирования ресурса."
---

## Событие: OnResourceDuplicate

Событие запускается сразу после дублирования ресурса.

- Служба: 1 - Parser Service Events
- Group: Resources

## Параметры события

| Имя               | Описание                                                                       |
| ----------------- | ------------------------------------------------------------------------------ |
| newResource       | Ссылка на вновь созданный объект `modResource`.                               |
| oldResource       | Ссылка на объект `modResource`, который был продублирован.                     |
| newName           | Имя, присвоенное дубликату.                                                    |
| duplicateChildren | Были ли также продублированы дочерние ресурсы.                                |
| prefixDuplicate   | Был ли добавлен префикс к имени дубликата.                                    |
| publishedMode     | Состояние публикации дубликата: `'preserve'`, `'publish'` или `'unpublish'`.   |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
