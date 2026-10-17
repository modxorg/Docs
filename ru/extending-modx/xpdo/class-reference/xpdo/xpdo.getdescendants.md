---
title: "xPDO.getDescendants"
description: "Получает классы, наследующие указанный класс."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getdescendants"
---

## xPDO::getDescendants

Возвращает массив полных имён классов, наследующих указанный класс, на основе загруженной карты классов.

## Синтаксис

``` php
array getDescendants (string $className)
```

## Пример

``` php
$descendants = $xpdo->getDescendants('MODX\\Revolution\\modResource');
```

## Смотрите также

-   [xPDO.getAncestry](extending-modx/xpdo/class-reference/xpdo/xpdo.getancestry "xPDO.getAncestry")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")