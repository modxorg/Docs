---
title: "OnBeforeManagerPageInit"
translation: "extending-modx/plugins/system-events/onbeforemanagerpageinit"
---

## Событие: OnBeforeManagerPageInit

Загружается прямо перед запуском контроллера менеджера и после проверки разрешений.

Служба: 2 - Manager Access Events
Группа: System

## Параметры события

Обратите внимание, что параметры события для этого события изменились в 3.0.0-alpha2.

| Имя            | Описание                                                         |
| -------------- | ---------------------------------------------------------------- |
| action         | Маршрут или действие для загрузки в текущем пространстве имен    |
| namespace      | Пространство имен (в виде строки) для текущего пространства имен |
| namespace_path | Основной путь для пространства имен                              |

## Замечания

| Предыдущее событие | [OnManagerPageInit](extending-modx/plugins/system-events/onmanagerpageinit "OnManagerPageInit")                                                    |
| ------------------ | -------------------------------------------------------------------------------------------------------------------------------------------------- |
| Следующее событие  | [OnManagerPageBeforeRender](extending-modx/plugins/system-events/onmanagerpagebeforerender "OnManagerPageBeforeRender")                            |
| File               | [core/model/modx/modmanagercontroller.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modmanagercontroller.class.php) |
| Class              | абстрактный класс modManagerController                                                                                                             |
| Method             | public function render()                                                                                                                           |

## Пример

Такой плагин выведет в "Журнал ошибок" какой контроллер загрузился:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeManagerPageInit':
        print_r($action);
        break;
}
```

## Смотри также

-   [System Events](extending-modx/plugins/system-events "System Events")
-   [Плагины](extending-modx/plugins "Плагины")
