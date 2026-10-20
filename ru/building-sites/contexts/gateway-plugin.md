---
title: "Использование плагина шлюза"
translation: "building-sites/contexts/gateway-plugin"
description: "Несколько доменов с одной установки MODX: переключение контекста по хосту плагином на OnHandleRequest или отдельным гейтвеем."
---

Одна установка может обслуживать несколько доменов. Различает их контекст запроса, и выбирают его два механизма: плагин, который переключает контекст, или гейтвей, который начинает в нём работу.

## Переключение контекста по хосту

Событие `OnHandleRequest` вызывается в начале каждого запроса — и на фронтенде, и в менеджере. Плагин на него читает хост и переключает контекст:

``` php
<?php
if ($modx->context->get('key') === 'mgr') {
    return;
}

$hosts = [
    'domain2.tld' => 'domain2',
    'domain3.tld' => 'domain3',
];

$host = $_SERVER['HTTP_HOST'] ?? '';
if (isset($hosts[$host])) {
    $modx->switchContext($hosts[$host]);
}
```

Плагин ничего не возвращает в менеджере, потому что менеджер должен остаться в контексте `mgr`.

`switchContext($contextKey, $reload = false)` возвращает `false`, когда контекст не загрузился. Результат стоит проверять, прежде чем дальнейшая работа запроса будет опираться на новый контекст:

``` php
if (!$modx->switchContext('domain2')) {
    $modx->log(modX::LOG_LEVEL_ERROR, 'The context "domain2" was not found.');
}
```

## Собственный гейтвей

Второй механизм обходится без плагина. Файл `index.php` читает контекст из файла `config.context.php` рядом с ним:

``` php
<?php
return 'domain2';
```

Если файла нет, запрос начинается в контексте `web`. Каталог с копией `index.php`, `config.core.php` и `.htaccess`, а также со своим `config.context.php` — отдельный гейтвей для этого домена, см. [Второй домен](building-sites/contexts/virtual-host).

## Session handler

Переключение контекста во время выполнения не подгружает свой session handler: его задаёт гейтвей, и он действует на весь запрос. Контексту с собственным session handler нужен гейтвей своего каталога.

## Смотрите также

1. [Контексты](building-sites/contexts)
2. [Второй домен](building-sites/contexts/virtual-host)
3. [OnHandleRequest](extending-modx/plugins/system-events/onhandlerequest)
4. [GatewayManager](extras/gatewaymanager)
