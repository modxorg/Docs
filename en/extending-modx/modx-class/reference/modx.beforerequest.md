---
title: "modX.beforeRequest"
description: "Removes database placeholders before the web request continues"
---

## modX::beforeRequest

`modRequest::handleRequest()` calls it after the Resource identifier is resolved and before `OnWebPageInit` fires. The method removes the `+username`, `+password`, `+dbname` and `+host` placeholders.

`initialize()` copies config values into `+`-prefixed placeholders. With `filter_config_placeholders` enabled (the default), the credentials (`username`, `password`, `dbname`, …) are stripped from the config before that copy. `+username`, `+password` and `+dbname` therefore only appear when the setting is disabled; `beforeRequest()` removes them either way.

The 3.x config has no `host` key (only `http_host`), so `initialize()` never creates `+host`. The call guards against it being set elsewhere, as in the example below. Only front-end requests reach `beforeRequest()` — manager and connector requests never call it.

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
