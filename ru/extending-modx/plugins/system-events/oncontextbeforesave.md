---
title: "OnContextBeforeSave"
translation: "extending-modx/plugins/system-events/oncontextbeforesave"
---

## Событие: OnContextBeforeSave

Происходит прямо перед сохранением контекста.

Служба: 2 - Manager Access Events

## Параметры события

| Имя     | Описание                                                                                                                                        |
| ------- | ----------------------------------------------------------------------------------------------------------------------------------------------- |
| context | Ссылка на объект modContext.                                                                                                                    |
| mode    | Либо 'new' (modSystemEvent::MODE\_NEW) либо 'upd' (modSystemEvent::MODE\_UPD) в зависимости от того, является ли новый объект или существующим. |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
