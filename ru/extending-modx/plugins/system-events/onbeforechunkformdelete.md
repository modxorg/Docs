---
title: "OnBeforeChunkFormDelete"
translation: "extending-modx/plugins/system-events/onbeforechunkformdelete"
---

## Событие: OnBeforeChunkFormDelete

Запускается до удаления сниппета.

Сервис: 1 - Парсер Сервис событий
Группа: Chunks

## Параметры события

| Имя   | Описание                   |
| ----- | -------------------------- |
| chunk | Ссылка на объект modChunk. |
| id    | Идентификатор чанка.       |

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
