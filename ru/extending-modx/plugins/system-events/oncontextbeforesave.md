---
title: "OnContextBeforeSave"
translation: "extending-modx/plugins/system-events/oncontextbeforesave"
description: "Событие запускается непосредственно перед сохранением контекста, в modContext::save()."
---

## Событие: OnContextBeforeSave

Событие запускается непосредственно перед сохранением контекста, в `modContext::save()`.

- Служба: 1 - Parser Service Events
- Group: Contexts

## Параметры события

| Имя       | Описание                                                                                                                                        |
| --------- | ----------------------------------------------------------------------------------------------------------------------------------------------- |
| context   | Ссылка на объект modContext.                                                                                                                    |
| mode      | Либо 'new' (modSystemEvent::MODE\_NEW) либо 'upd' (modSystemEvent::MODE\_UPD) в зависимости от того, новый это объект или существующий.        |
| cacheFlag | Аргумент cacheFlag, переданный в метод save().                                                                                                  |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
