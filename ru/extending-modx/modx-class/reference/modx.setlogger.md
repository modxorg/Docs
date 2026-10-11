---
title: "modX.setLogger"
translation: "extending-modx/modx-class/reference/modx.setlogger"
description: "Направить сообщения журнала MODX на PSR-3 логгер вместо старых обработчиков"
---

## modX::setLogger

Направляет сообщения журнала MODX на PSR-3 `LoggerInterface`. Сообщения выше порога `log_level` уходят в этот логгер вместо старых обработчиков FILE, ECHO и HTML.

| Уровень xPDO | Уровень PSR |
| --- | --- |
| `debug`, `info`, `warning`, `error` | тот же уровень |
| `fatal` | `critical` |
| всё остальное | `notice` |

Контекст несёт `def`, `file`, `line` и `xpdo_level`. Обработчик `modRegister` продолжает писать рядом с логгером, а фатальное сообщение по-прежнему завершается в `sendError('fatal')`.

## Синтаксис

``` php
void setLogger (LoggerInterface $logger)
```

- `$logger` _(Psr\Log\LoggerInterface)_ экземпляр логгера, который получает сообщения

## Пример

``` php
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

$logger = new Logger('modx');
$logger->pushHandler(new StreamHandler('php://stderr'));

$modx->setLogger($logger);
$modx->log(modX::LOG_LEVEL_ERROR, 'staff table is missing');
```

## Смотрите также

- [modX](extending-modx/core-model/modx)
- [log_level](building-sites/settings/log_level)
