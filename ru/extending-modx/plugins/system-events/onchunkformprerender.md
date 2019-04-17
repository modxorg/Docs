---
title: "OnChunkFormPrerender"
translation: "extending-modx/plugins/system-events/onchunkformprerender"
---

## Событие: OnChunkFormPrerender

Происходит до визуализации формы модификации чанка, но после регистрации JS. Может использоваться для визуализации пользовательского Javascript для mgr.

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
