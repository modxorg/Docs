---
title: "modX.beforeRequest"
translation: "extending-modx/modx-class/reference/modx.beforerequest"
description: "Удалить плейсхолдеры базы данных до продолжения веб-запроса"
---

## modX::beforeRequest

`modRequest::handleRequest()` вызывает его после определения идентификатора ресурса и перед срабатыванием `OnWebPageInit`. Метод убирает плейсхолдеры `+username`, `+password`, `+dbname` и `+host`.

При включённом `filter_config_placeholders` (по умолчанию) `initialize()` уже убирает первые три до копирования, поэтому `+username`, `+password` и `+dbname` появляются только при отключённой настройке; `beforeRequest()` убирает их в любом случае. В конфигурации 3.x нет ключа `host` (только `http_host`), поэтому `initialize()` не создаёт `+host` — вызов лишь страхуется на случай, если его установили в другом месте, как в примере ниже. До него доходят только фронтенд-запросы; запросы менеджера и коннектора его не вызывают.

## Синтаксис

``` php
void beforeRequest ()
```

Параметров нет.

## Пример

``` php
$modx->initialize('web');
$modx->setPlaceholder('+host', 'localhost');

$modx->beforeRequest();

$host = $modx->getPlaceholder('+host'); // null
```

## Смотрите также

- [modX](extending-modx/core-model/modx)
- [modX.initialize](extending-modx/modx-class/reference/modx.initialize)
- [OnWebPageInit](extending-modx/plugins/system-events/onwebpageinit)
