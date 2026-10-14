---
title: "OnChunkFormDelete"
translation: "extending-modx/plugins/system-events/onchunkformdelete"
description: "Событие запускается после удаления чанка в менеджере."
---

## Событие: OnChunkFormDelete

Событие запускается после удаления чанка в менеджере, из процессора `Element\Chunk\Remove`.

- Служба: 1 - Parser Service Events
- Group: Chunks

## Параметры события

| Имя    | Описание                                                  |
| ------ | --------------------------------------------------------- |
| id     | Идентификатор чанка.                                      |
| chunk  | Ссылка на объект modChunk.                                |
| object | Ссылка на объект modChunk, тот же экземпляр, что и chunk. |

## Пример

Такой плагин запишет в "Журнал ошибок" id и имя удаленного чанка:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnChunkFormDelete':
        $n = $chunk->get('name');
        $modx->log(modX::LOG_LEVEL_ERROR, 'Был удален чанк с id '.$id.' его звали '.$n.' сердца у тебя нет!');
        break;
}
```

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
