---
title: "xPDOQuery.setClassAlias"
description: "Sets a SQL alias for the table represented by the main class."
_old_id: "1298"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.setclassalias"
---

## xPDOQuery::setClassAlias

Sets a SQL alias for the table represented by the main class.

## Syntax

``` php
xPDOQuery setClassAlias ([string $alias = ''])
```

## Example

Grab all OtherBox objects, but set the alias to 'Box' for easier reading.

``` php
$query = $xpdo->newQuery('OtherBox');
$query->setClassAlias('Box');
$query->where(array(
   'Box.name' => 'RoundBox',
));
$otherBoxes = $xpdo->getCollection('OtherBox',$query);
```

## See Also

- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
