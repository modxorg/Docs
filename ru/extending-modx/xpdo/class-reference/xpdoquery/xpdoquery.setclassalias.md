---
title: "xPDOQuery.setClassAlias"
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.setclassalias"
---

## xPDOQuery::setClassAlias

Устанавливает псевдоним SQL для таблицы, представленной основным классом.

## Синтаксис

API Docs: [xPDOQuery::setClassAlias()](<http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoquery.class.html#xPDOQuery::setClassAlias()>)

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
