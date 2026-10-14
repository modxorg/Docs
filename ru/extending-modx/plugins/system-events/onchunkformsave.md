---
title: "OnChunkFormSave"
translation: "extending-modx/plugins/system-events/onchunkformsave"
description: "Событие запускается после создания или обновления чанка в менеджере."
---

## Событие: OnChunkFormSave

Событие запускается после создания или обновления чанка в менеджере, из процессоров `Element\Chunk\Create` и `Update`.

- Служба: 1 - Parser Service Events
- Group: Chunks

## Параметры события

| Имя    | Описание                                                  |
| ------ | --------------------------------------------------------- |
| mode   | Либо 'new' или 'upd', в зависимости от обстоятельств.     |
| id     | Идентификатор чанка.                                      |
| chunk  | Ссылка на объект modChunk.                                |
| object | Ссылка на объект modChunk, тот же экземпляр, что и chunk. |

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

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
