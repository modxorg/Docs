---
title: "OnBeforeEmptyTrash"
translation: "extending-modx/plugins/system-events/onbeforeemptytrash"
description: "Событие запускается перед очисткой корзины на сайте."
---

## Событие: OnBeforeEmptyTrash

Событие запускается перед очисткой корзины на сайте. Также его вызывает процессор `resources/trash/purge` при окончательном удалении ресурсов, уже перемещённых в корзину.

- Служба: 1 - Parser Service Events
- Group: Resources

## Параметры события

| Имя | Описание                                            |
| --- | --------------------------------------------------- |
| ids | Массив ID ресурсов, которые будут навсегда удалены. |
| resources | Массив объектов modResource, которые будут удалены. Передаётся по ссылке. |

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
