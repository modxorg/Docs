---
title: "OnChunkFormPrerender"
translation: "extending-modx/plugins/system-events/onchunkformprerender"
description: "Событие запускается перед отрисовкой формы чанка в менеджере."
---

## Событие: OnChunkFormPrerender

Событие запускается перед отрисовкой формы чанка в менеджере: после того, как контроллер загрузил свои пользовательские CSS/JS (`loadCustomCssJs()`), но до регистрации CSS/JS страницы (`registerCssJs()`). Можно использовать для вывода пользовательского JavaScript в mgr.

- Служба: 1 - Parser Service Events
- Group: Chunks

## Параметры события

| Имя   | Описание                                                 |
| ----- | -------------------------------------------------------- |
| mode  | Либо 'new' либо 'upd', в зависимости от обстоятельств.   |
| id    | Идентификатор Чанка. Это будет 0 для новых чанков.       |
| chunk | Ссылка на объект modChunk. Будет нулевым в новых чанках. |

## Пример

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
