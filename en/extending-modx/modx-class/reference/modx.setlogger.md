---
title: "modX.setLogger"
description: "Routes MODX log messages to a PSR-3 logger instead of the legacy log targets"
---

## modX::setLogger

Routes MODX log messages to a PSR-3 `LoggerInterface`. Messages above the `log_level` threshold go to that logger instead of the legacy FILE, ECHO and HTML targets.

| xPDO level | PSR level |
| --- | --- |
| `debug`, `info`, `warning`, `error` | the same level |
| `fatal` | `critical` |
| anything else | `notice` |

The context carries `def`, `file`, `line` and `xpdo_level`. A `modRegister` target keeps writing alongside the logger, and a fatal message still ends in `sendError('fatal')`.

## Syntax

``` php
void setLogger (LoggerInterface $logger)
```

- `$logger` _(Psr\Log\LoggerInterface)_ logger instance that receives the messages

## Example

``` php
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

$logger = new Logger('modx');
$logger->pushHandler(new StreamHandler('php://stderr'));

$modx->setLogger($logger);
$modx->log(modX::LOG_LEVEL_ERROR, 'staff table is missing');
```

## See Also

- [modX](extending-modx/core-model/modx)
- [log_level](building-sites/settings/log_level)
