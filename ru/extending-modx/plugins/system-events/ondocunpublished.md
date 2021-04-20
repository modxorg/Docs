---
title: "OnDocUnPublished"
translation: "extending-modx/plugins/system-events/ondocunpublished"
---

## Событие: OnDocUnPublished

Запускается после того как ресурс снят с публикации через контекстное меню документа в дереве ресурсов.

Служба: 5 - Template Service Events
Группа: Нет

## Параметры события

| Имя      | Описание                                              |
| -------- | ----------------------------------------------------- |
| docid    | Идентификатор неопубликованного ресурса. (устаревшее) |
| id       | Идентификатор неопубликованного ресурса.              |
| resource | Ссылка на неопубликованный объект modResource.        |

## Важно! Перед использование этого события нужно знать

Событие срабатывает только при снятии публикации ресурса через контекстное меню документа в дереве ресурсов. Если вы уберёте галочку опубликован при редактировании документа на странице самого документа, ничего не произойдет.

## Пример

Такой плагин выведет в "Журнал ошибок" массив снятого с публикации ресурса, а на экран сообщение об успехе:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnDocUnPublished':
        $response = array(
        	'success' => false,
        	'message' => 'Ресурс снят с публикации!',
        	'data' => array(),
        );
        echo $modx->toJSON($response);
        exit; 
        $modx->log(modX::LOG_LEVEL_ERROR, print_r($resource->toArray(),true));
        break;
}
```

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
