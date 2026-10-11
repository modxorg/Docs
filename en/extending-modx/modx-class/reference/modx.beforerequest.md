---
title: "modX.beforeRequest"
description: "Removes database placeholders before the web request continues"
---

## modX::beforeRequest

`modRequest::handleRequest()` calls it after the Resource identifier is resolved and before `OnWebPageInit` fires. The method drops the `+username`, `+password`, `+dbname` and `+host` placeholders that `initialize()` copied from the config.

With `filter_config_placeholders` enabled (the default), `initialize()` already dropped the first three. This call drops `+host` as well and runs regardless of the setting. Only front-end requests reach it; manager and connector requests never call it.

## Syntax

``` php
void beforeRequest ()
```

No parameters.

## Example

``` php
$modx->initialize('web');
$modx->setPlaceholder('+host', 'localhost');

$modx->beforeRequest();

$host = $modx->getPlaceholder('+host'); // null
```

## See Also

- [modX](extending-modx/core-model/modx)
- [modX.initialize](extending-modx/modx-class/reference/modx.initialize)
- [OnWebPageInit](extending-modx/plugins/system-events/onwebpageinit)
