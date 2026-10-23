---
title: "Использование плагина шлюза"
translation: "building-sites/contexts/gateway-plugin"
description: "Несколько доменов с одной установки MODX: плагин, который переключает контекст по хосту, и подход со своим виртуальным хостом и каталогом каждому домену."
---

Одна установка может обслуживать несколько доменов. Их различает контекст запроса. Делают это двумя подходами:

- **Один виртуальный хост, несколько доменов.** Каждый домен указывает на один и тот же виртуальный хост. Плагин на `OnHandleRequest` читает хост и переключает контекст. Этот подход описан на странице.
- **Свой виртуальный хост и свой каталог каждому домену.** У каждого домена свой виртуальный хост и свой каталог шлюза со своим `config.context.php`. См. [Использование виртуальных хостов](building-sites/contexts/virtual-host).

Первому подходу нужен только плагин.

## Переключение контекста по хосту

Событие `OnHandleRequest` вызывается в начале каждого запроса, и на фронтенде, и в менеджере.

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

Этот `return` оставляет менеджер в контексте `mgr`.

`switchContext($contextKey, $reload = false)` возвращает `false`, когда контекст не загрузился и когда ключ уже текущий. Во втором случае контекст заново не загружается. Проверьте результат, прежде чем опираться на новый контекст:

``` php
if (!$modx->switchContext('domain2')) {
    $modx->log(modX::LOG_LEVEL_ERROR, 'The context "domain2" was not found.');
}
```

На запросе, который уже в `domain2`, эта проверка тоже не проходит: контекст не переключался.

## Обработчик сессии

Переключение контекста во время запроса не подгружает свой обработчик сессии. Оно не меняет язык, локаль и cookie сессии. Они берутся из контекста, с которого стартовал `index.php`. Домену со своим языком или cookie нужен свой каталог с `config.context.php`. См. [Использование виртуальных хостов](building-sites/contexts/virtual-host).

## Смотрите также

1. [Контексты](building-sites/contexts)
2. [Использование виртуальных хостов](building-sites/contexts/virtual-host)
3. [OnHandleRequest](extending-modx/plugins/system-events/onhandlerequest)
4. [GatewayManager](extras/gatewaymanager)
