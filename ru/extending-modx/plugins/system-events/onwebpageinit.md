---
title: "OnWebPageInit"
translation: "extending-modx/plugins/system-events/onwebpageinit"
description: "Срабатывает при инициализации запроса веб-ресурса, после modX::beforeRequest() и до загрузки ресурса."
---

## Событие: OnWebPageInit

Срабатывает во время процесса инициализации ресурса, после вызова [modX::beforeRequest()](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modX.php) (который удаляет плейсхолдеры конфигурации `+username`, `+password`, `+dbname` и `+host`), но до загрузки ресурса, проверок несанкционированной страницы и отправки ответа.

Обратите внимание, что для дружественных URL (режим `alias`) несовпавший alias уже вызывает страницу ошибки **до** этого события; основная загрузка ресурса и проверки `sendErrorPage()`/`sendUnauthorizedPage()` происходят **после** него.

- Служба: 5 - Template Service Events
- Group: System

## Параметры события

Нет.

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
