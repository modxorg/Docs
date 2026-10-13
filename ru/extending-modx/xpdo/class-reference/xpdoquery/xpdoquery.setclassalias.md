---
title: "xPDOQuery.setClassAlias"
description: "Устанавливает псевдоним SQL для таблицы, представленной основным классом."
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.setclassalias"
---

## xPDOQuery::setClassAlias

Устанавливает псевдоним SQL для таблицы, представленной основным классом.

## Синтаксис

```php
xPDOQuery setClassAlias ([string $alias = ''])
```

## Пример

Возьмите все объекты "OtherBox", но установите псевдоним "Box" для удобства чтения..

```php
$query = $xpdo->newQuery('OtherBox');
$query->setClassAlias('Box');
$query->where(array(
   'Box.name' => 'RoundBox',
));
$otherBoxes = $xpdo->getCollection('OtherBox',$query);
```

## Смотрите также

-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
