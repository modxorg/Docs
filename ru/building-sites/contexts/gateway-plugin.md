---
title: "Использование плагина шлюза"
translation: "building-sites/contexts/gateway-plugin"
description: "Несколько доменов с одной установки MODX: плагин, который переключает контекст по хосту, и подход со своим виртуальным хостом и каталогом каждому домену."
---

Одна установка может обслуживать несколько доменов, и различает их контекст запроса. Делают это двумя подходами:

- **Один виртуальный хост, несколько доменов.** Каждый домен указывает на один и тот же виртуальный хост, а плагин на `OnHandleRequest` читает хост и переключает контекст. Именно этот подход описан на странице.
- **Свой виртуальный хост и свой каталог каждому домену.** У каждого домена свой виртуальный хост и свой каталог гейтвея со своим `config.context.php`. См. [Использование виртуальных хостов](building-sites/contexts/virtual-host).

Первому подходу нужен только плагин.

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

Ранний выход оставляет менеджер в контексте `mgr`.

`switchContext($contextKey, $reload = false)` возвращает `false`, когда контекст не загрузился. Проверьте результат, прежде чем дальнейшая работа запроса будет опираться на новый контекст:

``` php
if (!$modx->switchContext('domain2')) {
    $modx->log(modX::LOG_LEVEL_ERROR, 'The context "domain2" was not found.');
}
```

## Обработчик сессии

Переключение контекста во время выполнения не подгружает свой session handler: его задаёт гейтвей, и он действует на весь запрос. Контексту с собственным session handler нужен гейтвей своего каталога: см. [Использование виртуальных хостов](building-sites/contexts/virtual-host).

## Смотрите также

1. [Контексты](building-sites/contexts)
2. [Использование виртуальных хостов](building-sites/contexts/virtual-host)
3. [OnHandleRequest](extending-modx/plugins/system-events/onhandlerequest)
4. [GatewayManager](extras/gatewaymanager)
