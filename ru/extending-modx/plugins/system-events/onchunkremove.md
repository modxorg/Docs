---
title: "OnChunkRemove"
translation: "extending-modx/plugins/system-events/onchunkremove"
description: "Событие запускается после удаления чанка, в modChunk::remove()."
---

## Событие: OnChunkRemove

Событие запускается после удаления чанка, в `modChunk::remove()`.

- Служба: 1 - Parser Service Events
- Group: Chunks

## Параметры события

| Имя       | Описание                                     |
| --------- | -------------------------------------------- |
| chunk     | Ссылка на объект modChunk.                   |
| ancestors | Массив предков, переданный в метод remove(). |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
