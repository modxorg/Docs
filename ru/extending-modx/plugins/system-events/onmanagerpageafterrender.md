---
title: "OnManagerPageAfterRender"
translation: "extending-modx/plugins/system-events/onmanagerpageafterrender"
description: "Событие запускается в контроллере менеджера после обработки контента, непосредственно перед возвратом ответа."
---

## Событие: OnManagerPageAfterRender

Событие запускается в контроллере менеджера после обработки контента и до его возврата. Последнее событие перед получением ответа.

- Служба: 2 - Manager Access Events
- Group: System

## Параметры события

| Имя        | Описание                                          |
| ---------- | ------------------------------------------------- |
| controller | Экземпляр контроллера текущей страницы менеджера. |

## Примечания

| Предыдущее событие | [OnManagerPageBeforeRender](extending-modx/plugins/system-events/onmanagerpagebeforerender "OnManagerPageBeforeRender")                            |
| ------------------ | -------------------------------------------------------------------------------------------------------------------------------------------------- |
| Следующее событие  | —                                                                                                                                                 |
| Файл               | [core/src/Revolution/modManagerController.php](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modManagerController.php)        |
| Класс              | abstract class modManagerController                                                                                                                |
| Метод              | public function render()                                                                                                                           |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
