---
title: "OnManagerPageInit"
translation: "extending-modx/plugins/system-events/onmanagerpageinit"
description: "Событие запускается в обработчике запросов менеджера после определения действия запроса и перед загрузкой страницы менеджера."
---

## Событие: OnManagerPageInit

Событие запускается в обработчике запросов менеджера до загрузки ответа страницы менеджера и после определения действия запроса.

- Служба: 2 - Manager Access Events
- Group: System

## Параметры события

| Имя       | Описание                                                           |
| --------- | ------------------------------------------------------------------ |
| action    | Идентификатор загружаемого действия.                               |
| namespace | Ключ пространства имён загружаемого действия. По умолчанию `core`. |

## Примечания

| Предыдущее событие | [OnHandleRequest](extending-modx/plugins/system-events/onhandlerequest "OnHandleRequest")                                             |
| ------------------ | ------------------------------------------------------------------------------------------------------------------------------------- |
| Следующее событие  | [OnBeforeManagerPageInit](extending-modx/plugins/system-events/onbeforemanagerpageinit "OnBeforeManagerPageInit")                     |
| Файл               | [core/src/Revolution/modManagerRequest.php](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modManagerRequest.php) |
| Класс              | class modManagerRequest                                                                                                               |
| Метод              | public function handleRequest()                                                                                                       |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
