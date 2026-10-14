---
title: "OnChunkSave"
translation: "extending-modx/plugins/system-events/onchunksave"
description: "Событие запускается после сохранения чанка, в modChunk::save()."
---

## Событие: OnChunkSave

Событие запускается после сохранения чанка, в `modChunk::save()`.

- Служба: 1 - Parser Service Events
- Group: Chunks

## Параметры события

| Имя       | Описание                                                 |
| --------- | -------------------------------------------------------- |
| mode      | Либо 'new' или 'upd', в зависимости от обстоятельств.    |
| chunk     | Ссылка на объект modChunk.                               |
| cacheFlag | Аргумент cacheFlag, переданный в метод save().           |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
