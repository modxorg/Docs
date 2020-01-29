---
title: "OnManagerPageBeforeRender"
translation: "extending-modx/plugins/system-events/onmanagerpagebeforerender"
---

## Событие: OnManagerPageBeforeRender

Запускается в менеджере контролерра, перед обработкой контента.

Служба: 2 - Manager Access Events
Группа: System

## Параметры события

| Имя        | Описание                                          |
| ---------- | ------------------------------------------------- |
| controller | Экземпляр контроллера текущей страницы менеджера. |

## Remarks

| Предыдущее событие | [OnBeforeManagerPageInit](extending-modx/plugins/system-events/onbeforemanagerpageinit "OnBeforeManagerPageInit")                                  |
| ------------------ | -------------------------------------------------------------------------------------------------------------------------------------------------- |
| Следующее событие  | [OnManagerPageAfterRender](extending-modx/plugins/system-events/onmanagerpageafterrender "OnManagerPageAfterRender")                               |
| File               | [core/model/modx/modmanagercontroller.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modmanagercontroller.class.php) |
| Class              | абстрактный класс modManagerController                                                                                                             |
| Method             | public function render()                                                                                                                           |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
