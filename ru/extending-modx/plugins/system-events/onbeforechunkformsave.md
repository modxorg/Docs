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

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
