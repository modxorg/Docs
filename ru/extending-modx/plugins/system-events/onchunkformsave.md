---
title: "OnChunkFormSave"
translation: "extending-modx/plugins/system-events/onchunkformsave"
---

## Событие: OnChunkFormSave

Запускается после сохранения чанка.

Служба: 1 - Parser Service Events
Группа: Chunks

## Параметры события

| Имя   | Описание                                              |
| ----- | ----------------------------------------------------- |
| mode  | Либо 'upd' или 'new', в зависимости от обстоятельств. |
| chunk | Ссылка на объект modChunk.                            |
| id    | Идентификатор Чанка.                                  |

## Пример

Такой плагин запишет в "Журнал ошибок" id сохранённого чанка (нового или только что созданного):

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnChunkFormSave':
        if ($mode == modSystemEvent::MODE_NEW) {
            $modx->log(modX::LOG_LEVEL_ERROR, 'Сохранен новый чанк с id '.$id);
        } elseif ($mode == modSystemEvent::MODE_UPD){
            $modx->log(modX::LOG_LEVEL_ERROR, 'Сохранен существующий чанк с id '.$id);
        }
        break;
}
```

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
