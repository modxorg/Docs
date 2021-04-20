---
title: "OnPageNotFound"
translation: "extending-modx/plugins/system-events/onpagenotfound"
---

## Событие: OnPageNotFound

Срабатывает непосредственно перед тем, как пользователь перенаправляется на страницу ошибки при попытке просмотра несуществующего Ресурса.

Служба: 1 - Parser Service Events
Группа: Нет

## Параметры события

| Имя              | Описание                                                       |
| ---------------- | -------------------------------------------------------------- |
| response\_code   | Код ответа для отправки. По умолчанию "HTTP/1.1 404 Not Found" |
| error\_type      | Тип. По умолчанию 404.                                         |
| error\_header    | Заголовок отправляется: по умолчанию "HTTP/1.1 404 Not Found"  |
| error\_pagetitle | Название страницы ошибки.                                      |
| error\_message   | Сообщение отправляется на страницу ошибки.                     |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
