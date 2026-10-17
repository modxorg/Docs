---
title: "xPDO.fromCache"
description: "Получает объект из кеша по сигнатуре."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.fromcache"
---

## xPDO::fromCache

Возвращает закэшированный объект или коллекцию по её сигнатуре кеша. Возвращает закэшированное значение или `null`, если по этой сигнатуре ничего не сохранено.

## Синтаксис

``` php
mixed fromCache (string $signature, [string $class = ''], [array $options = array()])
```

## Пример

``` php
$data = $xpdo->fromCache($signature);
```

## Смотрите также

-   [xPDO.toCache](extending-modx/xpdo/class-reference/xpdo/xpdo.tocache "xPDO.toCache")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")