---
title: "OnBeforeChunkFormSave"
translation: "extending-modx/plugins/system-events/onbeforechunkformsave"
---

## Событие: OnBeforeChunkFormSave

Запускается после отправки формы, но перед тем как сохранить чанк.

Служба: 1 - Parser Service Events
Группа: Chunks

## Параметры события

| Имя   | Описание                                              |
| ----- | ----------------------------------------------------- |
| mode  | Либо 'upd' или 'new', в зависимости от обстоятельств. |
| chunk | Ссылка на объект modChunk.                            |
| id    | Идентификатор чанка. Будет 0 для новых чанков.        |

## Примеры

Такой плагин выведет сообщение если не заполнено поле описание:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeChunkFormSave':
        //если обновляем существующий чанк
        if ($mode == modSystemEvent::MODE_UPD){
            //если не заполнено описание
            if (!$chunk->get('description')){
                $modx->event->output("Ты ничего не забыл?");
            }
        }
        break;
}
```
                
Такой плагин запишет в "Журнал ошибок" был ли создан новый чанк или обновлен существующий:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeChunkFormSave':
        if ($mode == modSystemEvent::MODE_UPD){
            echo 'Был обновлен существующий чанк';
        } elseif ($mode == modSystemEvent::MODE_NEW){
            echo 'Был создан чанк';
        }
        break;
}
```

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
