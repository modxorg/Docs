---
title: "OnChunkFormRender"
translation: "extending-modx/plugins/system-events/onchunkformrender"
---

## Событие: OnChunkFormRender

Запускается во время рендеринга формы. Полезно для рендеринга HTML прямо в форму Chunk.

Служба: 1 - Parser Service Events
Группа: Chunks

## Параметры события

| Имя   | Описание                                                 |
| ----- | -------------------------------------------------------- |
| mode  | Либо 'new' либо 'upd', в зависимости от обстоятельств.   |
| id    | Идентификатор Чанка. Это будет 0 для новых чанков.       |
| chunk | Ссылка на объект modChunk. Будет нулевым в новых чанках. |

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
