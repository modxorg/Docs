---
title: "OnBeforeManagerLogout"
translation: "extending-modx/plugins/system-events/onbeforemanagerlogout"
---

## Событие: OnBeforeManagerLogout

Запускается до выхода пользователя из менеджера. Выход еще не произошел.

Служба: 2 - Manager Access Service Events
Группа: Нет

## Параметры события

| Имя                | Описание                                                                                      |
| ------------------ | --------------------------------------------------------------------------------------------- |
| **&** user         | Ссылка на объект modUser пользователя. **Передано по ссылке**                                 |
| userid             | Идентификатор пользователя. (Устаревшее)                                                      |
| username           | Имя username пользователя. (Устаревшее)                                                       |
| **&** loginContext | Ключ контекста, в котором происходит выход из системы. **Передано по ссылке**                 |
| **&** addContexts  | Дополнительные контексты, в которых также происходит выход из системы. **Передано по ссылке** |


## Примеры

Такой плагин запишет в "Журнал ошибок" id вышедшего пользователя и откуда он вышел:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeManagerLogout':
        $modx->log(modX::LOG_LEVEL_ERROR, 'Пользователь с id'.$user->get('id').' разлогинился в контексте '.$loginContext.' и еще вот в этих'.print_r($addContexts));
        break;
}
```
                
Такой плагин выведет сообщение пользователю, о том что ему нельзя покидать контекст `mgr`:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeManagerLogout':
        //если попытается сбежать, мы его остановим
        if ($loginContext = 'mgr'){
            $response = array(
            	'success' => false,
            	'message' => 'Нельзя выходить! Ты один из нас.. один из нас.. один из нас.....',
            	'data' => array(),
            );
            echo $modx->toJSON($response);
            exit;
        }
        break;
}
```

## Смотри также

- [OnBeforeWebLogout event](extending-modx/plugins/system-events/onbeforeweblogout "OnBeforeWebLogout")
- [OnWebLogout event](extending-modx/plugins/system-events/onweblogout "OnWebLogout")
- [OnManagerLogout event](extending-modx/plugins/system-events/onmanagerlogout "OnManagerLogout")
- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
