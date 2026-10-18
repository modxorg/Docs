---
title: "xPDO.getCriteriaType"
description: "Возвращает тип объекта критериев."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getcriteriatype"
---

## xPDO::getCriteriaType

Возвращает тип указанного значения критериев: `'object'`, когда критерии сводятся к одному объекту (значению первичного ключа или массиву составного ключа), и `'collection'` во всех остальных случаях.

## Синтаксис

```php
string getCriteriaType (mixed $criteria)
```

## Пример

```php
$type = $xpdo->getCriteriaType(42);
// 'object'

$type = $xpdo->getCriteriaType(array('name' => 'John'));
// 'collection'
```

## Смотрите также

-   [xPDO.getCriteria](extending-modx/xpdo/class-reference/xpdo/xpdo.getcriteria "xPDO.getCriteria")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")