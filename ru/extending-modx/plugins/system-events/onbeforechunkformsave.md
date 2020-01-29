---
title: "OnBeforeChunkFormSave"
translation: "extending-modx/plugins/system-events/onbeforechunkformsave"
---

## Событие: OnBeforeChunkFormSave

Запускается после отправки формы, но перед сохранением чанка в панеле управления.

Служба: 1 - Parser Service Events
Группа: Chunks

## Параметры события

| Имя   | Описание                                              |
| ----- | ----------------------------------------------------- |
| mode  | Либо 'upd' или 'new', в зависимости от обстоятельств. |
| chunk | Ссылка на объект modChunk.                            |
| id    | Идентификатор чанка. Будет 0 для новых чанков.        |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
