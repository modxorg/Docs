---
title: "OnDocPublished"
translation: "extending-modx/plugins/system-events/ondocpublished"
description: "Событие запускается, когда ресурс публикуется через контекстное меню публикации."
---

## Событие: OnDocPublished

Вызывается, когда ресурс публикуется через контекстное меню публикации, из процессора `Resource\Publish`. Установка галочки «Опубликован» при редактировании ресурса событие не вызывает.

- Служба: 5 - Template Service Events
- Group: Resources

## Параметры события

| Имя      | Описание                                         |
| -------- | ------------------------------------------------ |
| docid    | Идентификатор публикуемого ресурса. (Устаревшее) |
| id       | Идентификатор публикуемого ресурса.              |
| resource | Ссылка на публикуемый объект modResource.        |

## Пример

Такой плагин запишет публикацию в журнал ошибок. Ответ этого события не обрабатывается процессором — отменить или изменить публикацию он не может:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnDocPublished':
        $modx->log(modX::LOG_LEVEL_ERROR, 'Resource '.$id.' was published');
        break;
}
```

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
