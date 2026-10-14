---
title: "OnHandleRequest"
translation: "extending-modx/plugins/system-events/onhandlerequest"
description: "Событие запускается в начале обработчика запроса — как в веб-, так и в контексте менеджера."
---

## Событие: OnHandleRequest

Событие запускается в начале обработчика запроса.

- Служба: 5 - Template Service Events
- Group: System

## Параметры события

**Нет.**

## Вывод

Все, что возвращается этим событием, будет записано в журналы как ошибка.

## Примечания

| Предыдущее событие | —                                                                                                                                                                                                                    |
| ------------------ | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Следующее событие  | [OnManagerPageInit](extending-modx/plugins/system-events/onmanagerpageinit "OnManagerPageInit") или [OnWebPageInit](extending-modx/plugins/system-events/onwebpageinit "OnWebPageInit") (в зависимости от контекста) |
| Файл               | [core/src/Revolution/modManagerRequest.php](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modManagerRequest.php)                                                                                |
| Класс              | class modManagerRequest                                                                                                                                                                                              |
| Метод              | public function handleRequest()                                                                                                                                                                                      |

::: tip Примечание
На стороне веб-сайта событие вызывается из [modRequest::handleRequest()](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modRequest.php); в менеджере оно вызывается из класса и метода, указанных выше.
:::

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
