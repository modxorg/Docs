---
title: "OnManagerPageBeforeRender"
translation: "extending-modx/plugins/system-events/onmanagerpagebeforerender"
---

## Событие: OnManagerPageBeforeRender

Запускается в контроллере менеджера, перед оформлением контента.

Служба: 2 - Manager Access Events
Группа: System

## Параметры события

| Имя        | Описание                                          |
| ---------- | ------------------------------------------------- |
| controller | Экземпляр контроллера текущей страницы менеджера. |

## Замечания

| Предыдущее событие | [OnBeforeManagerPageInit](extending-modx/plugins/system-events/onbeforemanagerpageinit "OnBeforeManagerPageInit")                                  |
| ------------------ | -------------------------------------------------------------------------------------------------------------------------------------------------- |
| Следующее событие  | [OnManagerPageAfterRender](extending-modx/plugins/system-events/onmanagerpageafterrender "OnManagerPageAfterRender")                               |
| File               | [core/model/modx/modmanagercontroller.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modmanagercontroller.class.php) |
| Class              | абстрактный класс `modManagerController`                                                                                                             |
| Method             | public function render()                                                                                                                           |

## Пример

Такой плагин выведет в "Журнал ошибок" какой контроллер запущен:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnManagerPageBeforeRender':
        // какой контроллер загружается
        print_r($scriptProperties['controller']->config);
        print_r($scriptProperties['controller']->scriptProperties);
        break;
}
```
                
Такой плагин выведет на экран "Доступ запрещен" пользователям, у которых в системных настройках указаны id ресурсов в параметре `allow_to_update`:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnManagerPageBeforeRender':
        switch($scriptProperties['controller']->config['controller']){
            //Проверяем права на редактирование документов
            case 'resource/update':
                // Проверяем наличие настройки allow_to_update (задается в настройках пользователя)
                // В ней мы перечисляем, какие документы пользователю можно редактировать
                // Если настройка задана, но id документа отсутствует в перечисленных разрешенных,
                // То возвращаем ошибку доступа 
                if($allow_to_update = $modx->getOption('allow_to_update')){
                    if(!is_array($allow_to_update)){
                        $allow_to_update = explode(",", $allow_to_update);
                        $allow_to_update = array_map('trim', $allow_to_update);
                    }
                    if(in_array($scriptProperties['controller']->scriptProperties['id'], $allow_to_update)){
                        $scriptProperties['controller']->failure('Доступ запрещен');
                        return;
                    }
                }
                break;
        }
        break;
}
```
                
Такой плагин подключит нужный нам js на страницы админки:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnManagerPageBeforeRender':
        $modx->controller->addJavascript('url/file.js');
        break;
}
```

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
