---
title: "OnBeforeManagerPageInit"
translation: "extending-modx/plugins/system-events/onbeforemanagerpageinit"
---

## Событие: OnBeforeManagerPageInit

Загружается прямо перед запуском контроллера менеджера и после проверки разрешений.

Служба: 2 - Manager Access Events
Группа: System

## Параметры события

| Имя      | Описание                                                        |
| -------- | --------------------------------------------------------------- |
| action   | Конфигурационный массив текущего контроллера менеджера.         |
| filename | Имя файла загружаемого контроллера. (**устарело с версии 2.2**) |

## Remarks

| Предыдущее событие | [OnManagerPageInit](extending-modx/plugins/system-events/onmanagerpageinit "OnManagerPageInit")                                                    |
| ------------------ | -------------------------------------------------------------------------------------------------------------------------------------------------- |
| Следующее событие  | [OnManagerPageBeforeRender](extending-modx/plugins/system-events/onmanagerpagebeforerender "OnManagerPageBeforeRender")                            |
| File               | [core/model/modx/modmanagercontroller.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modmanagercontroller.class.php) |
| Class              | абстрактный класс modManagerController                                                                                                             |
| Method             | public function render()                                                                                                                           |

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
