---
title: "OnBeforeDocFormDelete"
translation: "extending-modx/plugins/system-events/onbeforedocformdelete"
description: "Событие запускается перед удалением ресурса через менеджер."
---

## Событие: OnBeforeDocFormDelete

Событие запускается перед удалением ресурса через менеджер.

- Служба: 1 - Parser Service Events
- Group: Resources

## Параметры события

| Имя      | Описание                                                                |
| -------- | ----------------------------------------------------------------------- |
| resource | Ссылка на объект modResource.                                           |
| id       | Идентификатор ресурса.                                                  |
| children | Массив ID дочерних элементов этого ресурса, который также будет удален. |

## Примеры

Такой плагин выведет сообщение о том, что нельзя удалять определенный ресурс, и в логи добавит запись:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeDocFormDelete':
        //если id=7
        if ($id == 7){
            $modx->log(modX::LOG_LEVEL_ERROR, 'Кто-то пытался удалить ресурс '.$resource->get('pagetitle'));
            $response = array(
            	'success' => false,
            	'message' => 'Нельзя удалять! А то голову с плеч!',
            	'data' => array(),
            );
            echo $modx->toJSON($response);
            exit;
        } 
        break;
}
```
                
Такой плагин запишет в "Журнал ошибок" id удаленного ресурса и его детей если они есть:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeDocFormDelete':
        if (count($children) > 0) {
            $modx->log(modX::LOG_LEVEL_ERROR, 'Был удален ресурс '.$resource->get('pagetitle').print_r($children, true));
        }
        break;
}
```

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
