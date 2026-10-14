---
title: "OnChunkFormRender"
translation: "extending-modx/plugins/system-events/onchunkformrender"
description: "Событие запускается в процессе отрисовки формы."
---

## Событие: OnChunkFormRender

Запускается во время рендеринга формы. Полезно для рендеринга HTML прямо в форму Chunk.

- Служба: 1 - Parser Service Events
- Group: Chunks

## Параметры события

| Имя   | Описание                                                 |
| ----- | -------------------------------------------------------- |
| mode  | Либо 'new' либо 'upd', в зависимости от обстоятельств.   |
| id    | Идентификатор Чанка. Это будет 0 для новых чанков.       |
| chunk | Ссылка на объект modChunk. Будет нулевым в новых чанках. |


## Примеры

### Сохранить содержимое

Такой плагин добавит контент чанку и сохранит его:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnChunkFormRender':
        //если обновляем существующий
        if ($mode == modSystemEvent::MODE_UPD) {
            //добавили контент чанка
            $chunk->setContent('<p>Контент чанка</p>');
            //можно сразу сохранить новый контент
            $chunk->save();
        }
        break;
}
```
                
### Сохранить содержимое только если оно пустое

Такой плагин добавит контент чанку если у него нет контента и сохранит его:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnChunkFormRender':
        //если обновляем существующий
        if ($mode == modSystemEvent::MODE_UPD) {
            //забираем контент чанка
            $content = $chunk->getContent();
            // если контента нет, впихиваем новый
            if (!$content){
                $chunk->setContent('<p>Контент новый</p>');
                //можно сразу сохранить новый контент
                $chunk->save();
            }
        }
        break;
}
```
                
### Изменить содержимое без сохранения

Такой плагин добавит контент чанку но не сохранит его:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnChunkFormRender':
        //если обновляем существующий
        if ($mode == modSystemEvent::MODE_UPD) {
            //меняем все содержимое чанка
            $chunk->setContent('<p>Контент новый</p>');
            $chunk->set('name','NewChunkName');
            $chunk->set('description','Описание');
            //можно сразу сохранить новый контент $chunk->save();
        }
        break;
}
```

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
