---
title: "OnPageUnauthorized"
translation: "extending-modx/plugins/system-events/onpageunauthorized"
---

## Событие: OnPageUnauthorized

Запускается непосредственно перед тем, как пользователь перенаправляется на неавторизованную страницу при попытке просмотреть недоступный Ресурс.

Служба: 1 - Parser Service Events
Группа: Нет

## Параметры события

| Имя              | Описание                                                          |
| ---------------- | ----------------------------------------------------------------- |
| response\_code   | Код ответа для отправки. По умолчанию "HTTP/1.1 401 Unauthorized" |
| error\_type      | Тип. По умолчанию 401.                                            |
| error\_header    | Заголовок отправляется: по умолчанию "HTTP/1.1 401 Unauthorized"  |
| error\_pagetitle | Название неавторизованной страницы.                               |
| error\_message   | Сообщение отправляется на неавторизованную страницу.              |

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
