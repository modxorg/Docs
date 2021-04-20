---
title: "OnBeforeDocFormDelete"
translation: "extending-modx/plugins/system-events/onbeforedocformdelete"
---

## Событие: OnBeforeDocFormDelete

Запускается перед удалением ресурса.

Служба: 1 - Parser Service Events
Группа: Documents

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
        if (count($childrenIds) > 0) {
            $children = $childrenIds;
        }
        $modx->log(modX::LOG_LEVEL_ERROR, 'Был удален ресурс '.$resource->get('pagetitle').print_r($children));
        break;
}
```

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
