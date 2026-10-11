---
title: "modX.messageQuit"
description: "Legacy fatal reporter that logs every argument and stops the request"
---

## modX::messageQuit

**Deprecated since 2.2.0** — use `modX::log()` with `modX::LOG_LEVEL_FATAL` instead.

Concatenates the parameters into one message and logs it as fatal. A fatal message always reaches `sendError('fatal')`, which prints the error page and stops execution. The method returns nothing.

## Syntax

``` php
void messageQuit ([string $msg = 'unspecified error'], [string $query = ''], [bool $is_error = true], [string $nr = ''], [string $file = ''], [string $source = ''], [string $text = ''], [string $line = ''])
```

- `$msg` _(string)_ message text, by default `'unspecified error'`
- `$query` _(string)_ query printed next to the message, by default `''`
- `$is_error` _(bool)_ unused by the body, by default `true`
- `$nr` _(string)_ error number, by default `''`
- `$file` _(string)_ source file, by default `''`
- `$source` _(string)_ source snippet, by default `''`
- `$text` _(string)_ extra text, by default `''`
- `$line` _(string)_ source line, by default `''`

## Example

``` php
$modx->messageQuit('Could not save record', "UPDATE staff SET name = 'foobar'", true, '1062');
```

## See Also

- [modX](extending-modx/core-model/modx)
- [log_level](building-sites/settings/log_level)
