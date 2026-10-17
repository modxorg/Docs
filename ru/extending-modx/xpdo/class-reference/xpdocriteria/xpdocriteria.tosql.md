---
title: "xPDOCriteria.toSQL"
description: "Получает SQL-строку для критериев."
translation: "extending-modx/xpdo/class-reference/xpdocriteria/xpdocriteria.tosql"
---

## xPDOCriteria::toSQL

Возвращает SQL-строку для критериев. Когда `$parseBindings` равно `true` (по умолчанию), связанные значения подставляются в SQL; когда `false` — плейсхолдеры остаются на месте.

## Синтаксис

``` php
string toSQL ([boolean $parseBindings = true])
```

## Пример

``` php
echo $criteria->toSQL();
```

## Смотрите также

-   [xPDOQuery.prepare](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.prepare "xPDOQuery.prepare")
-   [xPDOCriteria](extending-modx/xpdo/class-reference/xpdocriteria "xPDOCriteria")