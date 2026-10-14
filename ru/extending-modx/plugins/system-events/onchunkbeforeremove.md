---
title: "OnChunkBeforeRemove"
translation: "extending-modx/plugins/system-events/onchunkbeforeremove"
description: "Событие запускается непосредственно перед удалением чанка, в modChunk::remove()."
---

## Событие: OnChunkBeforeRemove

Событие запускается непосредственно перед удалением чанка, в `modChunk::remove()`.

- Служба: 1 - Parser Service Events
- Group: Chunks

## Параметры события

| Имя       | Описание                                       |
| --------- | ---------------------------------------------- |
| chunk     | Ссылка на объект modChunk.                     |
| ancestors | Массив предков, переданный в метод remove().   |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
