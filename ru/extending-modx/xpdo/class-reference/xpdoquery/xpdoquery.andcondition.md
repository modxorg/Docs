---
title: "xPDOQuery.andCondition"
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.andcondition"
---

## xPDOQuery::andCondition

Добавьте условие `AND` в предложение `WHERE`.

## Синтаксис

API Docs: [xPDOQuery::andCondition()](<http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoquery.class.html#xPDOQuery::andCondition()>)

```php
void andCondition ( $conditions, [ $binding = null], [ $group = 0])
```

## Пример

Возьмите все коробки шириной 12 и высотой 4.

```php
$query = $xpdo->newQuery('Box');
$query->where(array('width' => 12));
$query->andCondition(array('height' => 4));
$boxes = $xpdo->getCollection('Box',$query);
```

**Предупреждение**
Порядок вызова функций важен! **andCondition** должно следовать после **where**, где метод был использован.

## Смотрите также

-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
