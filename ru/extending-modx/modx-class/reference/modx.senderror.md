---
title: "modX.sendError"
description: "Отправьте пользователя на типовую страницу ошибки ядра и остановите выполнение PHP."
translation: "extending-modx/modx-class/reference/modx.senderror"
---

## modX::sendError

Отправляет пользователя на типовую страницу ошибки ядра и останавливает выполнение PHP. MODX поставляет две такие страницы: `unavailable` (по умолчанию) и `fatal`.

## Синтаксис

``` php
void sendError ([string $type = ''], [array $options = array()])
```

- `$type` _(string)_ Имя шаблона ошибки в `core/error/{type}.include.php`. Если пусто, значение берётся из ключа `error_type` массива `$options`, по умолчанию `unavailable`.
- `$options` _(array)_ Значения, используемые для построения страницы ошибки:
    - `error_pagetitle` — тег `<title>` страницы (по умолчанию `Error 503: Service temporarily unavailable`)
    - `error_message` — HTML-содержимое страницы (по умолчанию `<p>Site temporarily unavailable.</p>`)
    - `error_header` — передаваемая строка заголовка HTTP (по умолчанию `HTTP/1.1 503 Service Unavailable`)
    - `error_type` — значение на случай пустого `$type`

Метод очищает буферы вывода, отправляет заголовок, печатает страницу, закрывает сессию и вызывает `exit()` — после него ничего не выполняется.

## Примеры

Отправить на недоступную страницу ошибки 503.

``` php
$modx->sendError('unavailable');
```

Отправить на фатальную 500 страницу.

``` php
$modx->sendError('fatal');
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
