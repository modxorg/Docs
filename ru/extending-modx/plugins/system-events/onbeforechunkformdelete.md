---
title: "OnBeforeChunkFormDelete"
translation: "extending-modx/plugins/system-events/onbeforechunkformdelete"
description: "Событие запускается перед удалением чанка."
---

## Событие: OnBeforeChunkFormDelete

Событие запускается перед удалением чанка.

- Служба: 1 - Parser Service Events
- Group: Chunks

## Параметры события

| Имя    | Описание                                     |
| ------ | -------------------------------------------- |
| chunk  | Ссылка на объект modChunk.                   |
| id     | Идентификатор чанка.                         |
| object | Псевдоним `chunk` — ссылка на тот же объект. |

## Пример

Такой плагин выведет сообщение о том, что нельзя удалять чанк:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeChunkFormDelete':
        if ($id == 69){
            $modx->event->output("Нельзя удалять чанк ".$chunk->get('name'));
        }
        break;
}
```

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
