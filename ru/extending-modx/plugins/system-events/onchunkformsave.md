---
title: "OnChunkFormSave"
translation: "extending-modx/plugins/system-events/onchunkformsave"
---

## Событие: OnChunkFormSave

Запускает после того, как Чанк сохраняется в менеджере.

Служба: 1 - Parser Service Events
Группа: Chunks

## Параметры события

| Имя   | Описание                                              |
| ----- | ----------------------------------------------------- |
| mode  | Либо 'upd' или 'new', в зависимости от обстоятельств. |
| chunk | Ссылка на объект modChunk.                            |
| id    | Идентификатор Чанка.                                  |

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
