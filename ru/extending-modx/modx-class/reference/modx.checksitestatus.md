---
title: "modX.checkSiteStatus"
translation: "extending-modx/modx-class/reference/modx.checksitestatus"
description: "Решить, отвечает ли сайт на публичные запросы или вернёт 503"
---

## modX::checkSiteStatus

Сообщает, отвечает ли сайт на этот запрос. `modRequest::handleRequest()` вызывает его сразу после `OnHandleRequest`.

Истина, если выполняется хотя бы одно условие:

- настройка [site_status](building-sites/settings/site_status) равна `'1'`;
- сеанс инициализирован и текущая политика даёт `view_offline`.

Ложный результат превращает запрос в 503, который отдаёт [site_unavailable_page](building-sites/settings/site_unavailable_page) или [site_unavailable_message](building-sites/settings/site_unavailable_message).

## Синтаксис

``` php
boolean checkSiteStatus ()
```

Параметров нет.

## Пример

``` php
if (!$modx->checkSiteStatus()) {
    // сайт офлайн для этого посетителя
}
```

## Смотрите также

- [modX](extending-modx/core-model/modx)
- [site_status](building-sites/settings/site_status)
- [site_unavailable_message](building-sites/settings/site_unavailable_message)
