---
title: "xPDOQuery.groupby"
description: "Добавьте предложение GROUP BY к запросу."
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.groupby"
---

## xPDOQuery::groupby

Добавьте предложение `GROUP BY` к запросу.

## Синтаксис

```php
xPDOQuery groupby (string $column, [string $direction = ''])
```

## Пример

Возьмите разные типы коробок, по крайней мере, с одной коробкой шириной 15.

```php
$query = $xpdo->newQuery('Box');
$query->where(array(
   'width' => 15,
));
$query->groupby('type');
$boxes = $xpdo->getCollection('Box',$query);
```

## Смотрите также

-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
