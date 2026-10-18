---
title: "xPDO.getCriteria"
description: "Получает предопределённый объект критериев для класса."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getcriteria"
---

## xPDO::getCriteria

Преобразует предопределённое определение критериев (объявленное в классе) в экземпляр `xPDO\Om\xPDOCriteria`. Аргумент `$type` выбирает, какие предопределённые критерии загрузить — по соглашению `'object'` и `'collection'` используются для получения одного экземпляра и нескольких экземпляров.

## Синтаксис

``` php
xPDO\Om\xPDOCriteria|null getCriteria (string $className, [string $type = null], [boolean|integer $cacheFlag = true])
```

## Пример

``` php
$criteria = $xpdo->getCriteria('modResource', 'collection');
```

## Смотрите также

-   [xPDO.getCriteriaType](extending-modx/xpdo/class-reference/xpdo/xpdo.getcriteriatype "xPDO.getCriteriaType")
-   [xPDO.newQuery](extending-modx/xpdo/class-reference/xpdo/xpdo.newquery "xPDO.newQuery")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")