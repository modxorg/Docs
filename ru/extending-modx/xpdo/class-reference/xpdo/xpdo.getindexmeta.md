---
title: "xPDO.getIndexMeta"
description: "Получает метаданные индексов для класса."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getindexmeta"
---

## xPDO::getIndexMeta

Возвращает метаданные индексов для класса с ключами по именам индексов. Каждая запись перечисляет индексированные столбцы и указывает, является ли индекс первичным и/или уникальным.

## Синтаксис

``` php
array|null getIndexMeta (string $className)
```

## Пример

``` php
$indexes = $xpdo->getIndexMeta('modResource');
```

## Смотрите также

-   [xPDO.getFieldMeta](extending-modx/xpdo/class-reference/xpdo/xpdo.getfieldmeta "xPDO.getFieldMeta")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")