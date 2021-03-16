---
title: "OnHandleRequest"
translation: "extending-modx/plugins/system-events/onhandlerequest"
---

## Событие: OnHandleRequest

Запускается в начале обработчика запроса.

Служба: 5 - Template Service Events
Группа: System

## Параметры события

**Нет.**

## Output

Все, что возвращается этим событием, будет записано в журналы как ошибка.

## Remarks

| Предыдущее событие | —                                                                                                                                                                                                    |
| ------------------ | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Следующее событие  | [OnManagerPageInit](extending-modx/plugins/system-events/onmanagerpageinit "OnManagerPageInit") или [OnWebPageInit](extending-modx/plugins/system-events/onwebpageinit "OnWebPageInit") (в зависимости от контекста) |
| File               | [core/model/modx/modmanagerrequest.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modmanagerrequest.class.php)                                                          |
| Class              | class modManagerRequest                                                                                                                                                                               |
| Method             | public function handleRequest()                                                                                                                                                                       |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
