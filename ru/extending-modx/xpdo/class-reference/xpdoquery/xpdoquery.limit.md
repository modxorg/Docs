---
title: "xPDOQuery.limit"
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.limit"
---

## xPDOQuery::limit

Добавьте к запросу предложение `LIMIT`/`OFFSET`.

## Синтаксис

API Docs: [xPDOQuery::limit()](<http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoquery.class.html#xPDOQuery::limit()>)

```php
xPDOQuery limit (integer $limit, [integer $offset = 0])
```

## Пример

Получите ящики 11-20 или вторые 10 ящиков.

```php
$query = $xpdo->newQuery('Box');
$query->limit(10,10);
$boxes = $xpdo->getCollection('Box',$query);
```

## Смотрите также

-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
