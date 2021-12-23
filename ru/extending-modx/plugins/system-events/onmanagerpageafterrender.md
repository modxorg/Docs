---
title: "OnManagerPageAfterRender"
translation: "extending-modx/plugins/system-events/onmanagerpageafterrender"
---

## Событие: OnManagerPageAfterRender

Запускается в менеджере контролерра, после обработки контента и до его возврата. Последнее событие до получения ответа.

Служба: 2 - Manager Access Events
Группа: System

## Параметры события

| Имя        | Описание                                          |
| ---------- | ------------------------------------------------- |
| controller | Экземпляр контроллера текущей страницы менеджера. |

## Remarks

| Предыдущее событие | [OnManagerPageBeforeRender](extending-modx/plugins/system-events/onmanagerpagebeforerender "OnManagerPageBeforeRender")                            |
| ------------------ | -------------------------------------------------------------------------------------------------------------------------------------------------- |
| Следующее событие  | —                                                                                                                                                 |
| File               | [core/model/modx/modmanagercontroller.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modmanagercontroller.class.php) |
| Class              | абстрактный класс modManagerController                                                                                                             |
| Method             | public function render()                                                                                                                           |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
