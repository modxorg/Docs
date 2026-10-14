---
title: "OnManagerPageBeforeRender"
translation: "extending-modx/plugins/system-events/onmanagerpagebeforerender"
description: "Событие запускается в контроллере менеджера перед обработкой контента страницы."
---

## Событие: OnManagerPageBeforeRender

Событие запускается в контроллере менеджера перед обработкой контента.

- Служба: 2 - Manager Access Events
- Group: System

## Параметры события

| Имя        | Описание                                          |
| ---------- | ------------------------------------------------- |
| controller | Экземпляр контроллера текущей страницы менеджера. |

## Примечания

| Предыдущее событие | [OnBeforeManagerPageInit](extending-modx/plugins/system-events/onbeforemanagerpageinit "OnBeforeManagerPageInit")                                  |
| ------------------ | -------------------------------------------------------------------------------------------------------------------------------------------------- |
| Следующее событие  | [OnManagerPageAfterRender](extending-modx/plugins/system-events/onmanagerpageafterrender "OnManagerPageAfterRender")                               |
| Файл               | [core/src/Revolution/modManagerController.php](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modManagerController.php)        |
| Класс              | abstract class `modManagerController`                                                                                                              |
| Метод              | public function render()                                                                                                                           |

## Пример

Такой плагин выведет в журнал ошибок, какой контроллер запущен:

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

Запретить редактирование ресурса, чей id отсутствует в настройке `allow_to_update`:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnManagerPageBeforeRender':
        $controller = $scriptProperties['controller'];
        if ($controller->config['controller'] !== 'resource/update') {
            break;
        }
        $allow_to_update = $modx->getOption('allow_to_update');
        if (empty($allow_to_update)) {
            break;
        }
        if (!is_array($allow_to_update)) {
            $allow_to_update = array_map('trim', explode(',', $allow_to_update));
        }
        if (!in_array($controller->scriptProperties['id'], $allow_to_update)) {
            $controller->failure('Access is denied');
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

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
