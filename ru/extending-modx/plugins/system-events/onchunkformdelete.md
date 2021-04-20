---
title: "OnChunkFormDelete"
translation: "extending-modx/plugins/system-events/onchunkformdelete"
---

## Событие: OnChunkFormDelete

Запускается после удаления чанка.

Служба: 1 - Parser Service Events
Группа: Chunks

## Параметры события

| Имя   | Описание                   |
| ----- | -------------------------- |
| chunk | Ссылка на объект modChunk. |
| id    | Идентификатор Чанка.       |

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

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
