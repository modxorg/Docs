---
title: "OnBeforeManagerPageInit"
translation: "extending-modx/plugins/system-events/onbeforemanagerpageinit"
description: "Событие запускается непосредственно перед запуском контроллера менеджера."
---

## Событие: OnBeforeManagerPageInit

Загружается прямо перед запуском контроллера менеджера и после проверки разрешений.

- Служба: 2 - Manager Access Events
- Group: System

## Параметры события

| Имя            | Описание                                                         |
| -------------- | ---------------------------------------------------------------- |
| action         | Маршрут или действие для загрузки в текущем пространстве имен    |
| controller     | То же значение, что и `action`                                   |
| namespace      | Пространство имен (в виде строки) для текущего пространства имен |
| namespace_path | Основной путь для пространства имен                              |

На страницах ошибок менеджера этих ключей нет в конфиге контроллера — контроллер Error создаётся только с `message` (и `errors`). Проверяйте их через `isset()` перед использованием.

## Замечания

| Предыдущее событие | [OnManagerPageInit](extending-modx/plugins/system-events/onmanagerpageinit "OnManagerPageInit")                                                    |
| ------------------ | -------------------------------------------------------------------------------------------------------------------------------------------------- |
| Следующее событие  | [OnManagerPageBeforeRender](extending-modx/plugins/system-events/onmanagerpagebeforerender "OnManagerPageBeforeRender")                            |
| File               | [core/src/Revolution/modManagerController.php](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modManagerController.php) |
| Class              | abstract class MODX\Revolution\modManagerController                                                                                               |
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

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
