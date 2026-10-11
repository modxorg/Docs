---
title: "modX.messageQuit"
translation: "extending-modx/modx-class/reference/modx.messagequit"
description: "Устаревший фатальный репортер: логирует все аргументы и останавливает запрос"
---

## modX::messageQuit

**Устарело с 2.2.0** — вместо этого используйте `modX::log()` с `modX::LOG_LEVEL_FATAL`.

Соединяет параметры в одно сообщение и пишет его как фатальное. Фатальное сообщение всегда доходит до `sendError('fatal')`, которое печатает страницу ошибки и останавливает выполнение. Метод ничего не возвращает.

## Синтаксис

``` php
void messageQuit ([string $msg = 'unspecified error'], [string $query = ''], [bool $is_error = true], [string $nr = ''], [string $file = ''], [string $source = ''], [string $text = ''], [string $line = ''])
```

- `$msg` _(string)_ текст сообщения, по умолчанию `'unspecified error'`
- `$query` _(string)_ запрос, печатаемый рядом с сообщением, по умолчанию `''`
- `$is_error` _(bool)_ телом метода не используется, по умолчанию `true`
- `$nr` _(string)_ номер ошибки, по умолчанию `''`
- `$file` _(string)_ исходный файл, по умолчанию `''`
- `$source` _(string)_ исходный сниппет, по умолчанию `''`
- `$text` _(string)_ дополнительный текст, по умолчанию `''`
- `$line` _(string)_ исходная строка, по умолчанию `''`

## Пример

``` php
$modx->messageQuit('Could not save record', "UPDATE staff SET name = 'foobar'", true, '1062');
```

## Смотрите также

- [modX](extending-modx/core-model/modx)
- [log_level](building-sites/settings/log_level)
