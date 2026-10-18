---
title: "xPDOQuery.prepare"
description: "Подготавливает запрос к выполнению."
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.prepare"
---

## xPDOQuery::prepare

Подготавливает запрос к выполнению, собирая его SQL-строку. Вызывайте этот метод перед `toSQL()` при отладке или когда вам нужно увидеть сгенерированный SQL до выполнения запроса.

## Синтаксис

```php
xPDOQuery prepare ([array $bindings = array()], [boolean $byValue = true], [boolean|integer $cacheFlag = null])
```

## Пример

```php
$query = $xpdo->newQuery('Box');
$query->where(array('width:>' => 10));
$query->prepare();
echo $query->toSQL();
```

## Смотрите также

-   [xPDOCriteria.toSQL](extending-modx/xpdo/class-reference/xpdocriteria/xpdocriteria.tosql "xPDOCriteria.toSQL")
-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")