---
title: "OnBeforeEmptyTrash"
translation: "extending-modx/plugins/system-events/onbeforeemptytrash"
---

## Событие: OnBeforeEmptyTrash

Загружается перед тем, как корзина очистится.

Служба: 1 - Parser Service Events
Группа: Documents

## Параметры события

| Имя | Описание                                            |
| --- | --------------------------------------------------- |
| ids | Массив ID ресурсов, которые будут навсегда удалены. |

## Примеры

Такой плагин выведет в "Журнал ошибок" id удаленных ресурсов:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeEmptyTrash':
        //массив удаленных ресурсов
        print_r($ids);
        break;
}
```
                
Такой плагин выведет сообщение, о том что в корзине присутствует важный документ, и его нельзя удалять:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeEmptyTrash':
        //если там есть документ с id = 26, то не удаляем
        if (in_array("26", $ids)){
            $response = array(
            	'success' => false,
            	'message' => 'ЭЙ! Там есть документ, который нельзя удалять!',
            	'data' => array(),
            );
            echo $modx->toJSON($response);
            exit;
        }
        break;
}
```

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
