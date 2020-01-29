---
title: "xPDOQuery.groupby"
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.groupby"
---

## xPDOQuery::groupby

Добавьте предложение `GROUP BY` к запросу.

## Синтаксис

API Docs: [xPDOQuery::groupby()](<http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoquery.class.html#xPDOQuery::groupby()>)

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
