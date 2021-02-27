---
title: "OnChunkFormPrerender"
translation: "extending-modx/plugins/system-events/onchunkformprerender"
---

## Событие: OnChunkFormPrerender

Запускается до изменения чанка, но JS подгружается. Можно использовать для визуализации пользовательских JavaScript в mgr.

Служба: 1 - Parser Service Events
Группа: Chunks

## Параметры события

| Имя   | Описание                                                 |
| ----- | -------------------------------------------------------- |
| mode  | Либо 'new' либо 'upd', в зависимости от обстоятельств.   |
| id    | Идентификатор Чанка. Это будет 0 для новых чанков.       |
| chunk | Ссылка на объект modChunk. Будет нулевым в новых чанках. |

## Example

Такой плагин подгружает `style` в `head` и сделает текст в `.x-form-text` красным:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnChunkFormPrerender':
        $modx->regClientStartupHTMLBlock('
        <style>
        .x-form-text {color: #ff0000;}
        </style>');
        break;
}
```

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
