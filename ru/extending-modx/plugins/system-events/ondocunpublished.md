---
title: "OnDocUnPublished"
translation: "extending-modx/plugins/system-events/ondocunpublished"
description: "Событие запускается, когда ресурс снимается с публикации через контекстное меню снятия с публикации."
---

## Событие: OnDocUnPublished

Вызывается, когда ресурс снимается с публикации через контекстное меню снятия с публикации, из процессора `Resource\Unpublish`. Снятие галочки «Опубликован» при редактировании ресурса событие не вызывает.

- Служба: 5 - Template Service Events
- Group: Resources

## Параметры события

| Имя      | Описание                                              |
| -------- | ----------------------------------------------------- |
| docid    | Идентификатор неопубликованного ресурса. (устаревшее) |
| id       | Идентификатор неопубликованного ресурса.              |
| resource | Ссылка на неопубликованный объект modResource.        |

## Пример

Такой плагин запишет снятие с публикации в журнал ошибок. Ответ этого события не обрабатывается процессором — отменить или изменить снятие с публикации он не может:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnDocUnPublished':
        $modx->log(modX::LOG_LEVEL_ERROR, 'Resource '.$id.' was unpublished');
        break;
}
```

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
