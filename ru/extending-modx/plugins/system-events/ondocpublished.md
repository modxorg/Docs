---
title: "OnDocPublished"
translation: "extending-modx/plugins/system-events/ondocpublished"
---

## Событие: OnDocPublished

Вызывается, когда ресурс публикуется через контекстное меню публикации.

Служба: 5 - Template Service Events
Группа: Нет

## Параметры события

| Имя      | Описание                                         |
| -------- | ------------------------------------------------ |
| docid    | Идентификатор публикуемого ресурса. (Устаревшее) |
| id       | Идентификатор публикуемого ресурса.              |
| resource | Ссылка на публикуемый объект modResource.        |


## Важно! Перед использование этого события нужно знать

Событие срабатывает только при публикации ресурса через контекстное меню документа в дереве ресурсов. Если вы поставите галочку опубликован при редактировании документа на странице самого документа, ничего не произойдет.

## Пример

Такой плагин выведет в "Журнал ошибок" массив публикуемого ресурса, а на экран сообщение об успехе:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnDocPublished':
        $response = array(
        	'success' => false,
        	'message' => 'Публикация прошла успешно!',
        	'data' => array(),
        );
        echo $modx->toJSON($response);
        exit; 
        $modx->log(modX::LOG_LEVEL_ERROR, print_r($resource->toArray(),true));
        break;
}
```

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
