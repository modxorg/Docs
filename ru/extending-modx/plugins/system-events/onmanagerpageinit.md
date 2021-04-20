---
title: "OnManagerPageInit"
translation: "extending-modx/plugins/system-events/onmanagerpageinit"
---

## Событие: OnManagerPageInit

Запускается в обработчике запросов менеджера до загрузки ответа страницы менеджера и после определения действия запроса.

Служба: 2 - Manager Access Events
Группа: System

## Параметры события

| Имя    | Описание                             |
| ------ | ------------------------------------ |
| action | Идентификатор загружаемого действия. |

## Remarks

| Предыдущее событие | [OnHandleRequest](extending-modx/plugins/system-events/onhandlerequest "OnHandleRequest")                                                    |
| ------------------ | -------------------------------------------------------------------------------------------------------------------------------------------- |
| Следующее событие  | [OnBeforeManagerPageInit](extending-modx/plugins/system-events/onbeforemanagerpageinit "OnBeforeManagerPageInit")                            |
| File               | [core/model/modx/modmanagerrequest.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modmanagerrequest.class.php) |
| Class              | class modManagerRequest                                                                                                                      |
| Method             | public function handleRequest()                                                                                                              |

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
