---
title: "OnBeforeManagerLogout"
translation: "extending-modx/plugins/system-events/onbeforemanagerlogout"
description: "Событие запускается перед выходом пользователя из менеджера."
---

## Событие: OnBeforeManagerLogout

Событие запускается перед выходом пользователя из менеджера. Выход ещё не произошёл.

- Служба: 2 - Manager Access Events
- Group: Security

## Параметры события

| Имя          | Описание                                                                                      |
| ------------ | --------------------------------------------------------------------------------------------- |
| user         | Ссылка на объект modUser пользователя. **Передано по ссылке**                                 |
| userid       | Идентификатор пользователя. (Устаревшее)                                                      |
| username     | Имя username пользователя. (Устаревшее)                                                       |
| loginContext | Ключ контекста, в котором происходит выход из системы. **Передано по ссылке**                 |
| addContexts  | Дополнительные контексты, в которых также происходит выход из системы. **Передано по ссылке** |


## Примеры

Такой плагин запишет в "Журнал ошибок" id вышедшего пользователя и откуда он вышел:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeManagerLogout':
        $modx->log(modX::LOG_LEVEL_ERROR, 'Пользователь с id'.$user->get('id').' разлогинился в контексте '.$loginContext.' и еще вот в этих'.print_r($addContexts, true));
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
        if ($loginContext === 'mgr'){
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
