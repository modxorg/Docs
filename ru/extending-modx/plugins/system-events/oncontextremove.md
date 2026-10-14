---
title: "OnContextRemove"
translation: "extending-modx/plugins/system-events/oncontextremove"
description: "Событие запускается после удаления контекста, в modContext::remove()."
---

## Событие: OnContextRemove

Событие запускается после удаления контекста, в `modContext::remove()`.

- Служба: 1 - Parser Service Events
- Group: Contexts

## Параметры события

| Имя       | Описание                                     |
| --------- | -------------------------------------------- |
| context   | Ссылка на объект modContext.                 |
| ancestors | Массив предков, переданный в метод remove(). |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
