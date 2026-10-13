---
title: "modX.sendRedirect"
description: "Отправляет перенаправление на указанный URL-адрес с помощью указанного метода."
translation: "extending-modx/modx-class/reference/modx.sendredirect"
---

## modX::sendRedirect

Отправляет перенаправление на указанный URL-адрес с помощью указанного метода.

## Синтаксис

``` php
void sendRedirect (string $url, [array|boolean $options = false], [string $type = ''], [string $responseCode = ''])
```

`$url` должен быть корректным URL-адресом — его можно построить с помощью [modX::makeUrl](extending-modx/modx-class/reference/modx.makeurl "modX.makeUrl"). Пустой URL не перенаправляется: метод пишет ошибку в лог и возвращается, не отправляя заголовок.

`$type` и `$responseCode` устарели с версии 2.0.5 — вместо них используйте ключи `type` и `responseCode` в `$options`. В 3.x они по-прежнему принимаются, но каждый вызов пишет в лог запись об устаревании; передавайте значения в массиве `$options`.

`$options` принимает массив (или логическое значение, которое трактуется как флаг `count_attempts`) с одной или несколькими из следующих пар ключ/значение:

- `type`, одно из следующих значений (по умолчанию `REDIRECT_HEADER`):
    - `REDIRECT_REFRESH` - использует метод обновления заголовка
    - `REDIRECT_META` - отправляет на выход тег META HTTP-EQUIV="Refresh"
    - `REDIRECT_HEADER` - использует метод расположения заголовка
- `responseCode` — полная строка статуса HTTP, а не просто `301` или `302`. По умолчанию `HTTP/1.1 302 Moved Temporarily`; для постоянного перенаправления передавайте `HTTP/1.1 301 Moved Permanently`.
- `count_attempts` _(boolean)_ добавляет к URL счётчик `?err=N`, чтобы разорвать циклы перенаправления. После 3 попыток — предел жёстко зашит в код — перенаправление считается фатальным: в лог пишется запись уровня FATAL и отправляется страница фатальной ошибки.
- `preserve_request` _(boolean)_ если задан, текущий запрос сохраняется (см. `modRequest::preserveRequest`) перед перенаправлением, чтобы сохранить referer.

## Примеры

Отправьте запрос перенаправления на ресурс с идентификатором 54.

``` php
$url = $modx->makeUrl(54);
$modx->sendRedirect($url);
```

Отправить редирект на modx.com. сделайте это с помощью метатега HTTP-EQUIV refresh.

``` php
$modx->sendRedirect('https://modx.com',array('type' => 'REDIRECT_META'));
```

Отправьте код ответа "301 перемещенный постоянно" вместо кода ответа "302 перемещенного временно" по умолчанию.

``` php
$modx->sendRedirect('https://modx.com',array('responseCode' => 'HTTP/1.1 301 Moved Permanently'));
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [modX.makeUrl](extending-modx/modx-class/reference/modx.makeurl "modX.makeUrl")
- [modX.sendForward](extending-modx/modx-class/reference/modx.sendforward "modX.sendForward")
- [modX.sendErrorPage](extending-modx/modx-class/reference/modx.senderrorpage "modX.sendErrorPage")
